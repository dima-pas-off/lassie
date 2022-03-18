(function () {
    'use strict'; 
 
    var initParent = BX.Sale.OrderAjaxComponent.init,
        getBlockFooterParent = BX.Sale.OrderAjaxComponent.getBlockFooter,
        editOrderParent = BX.Sale.OrderAjaxComponent.editOrder
        ;
 
    BX.namespace('BX.Sale.OrderAjaxComponentExt');    
 
    BX.Sale.OrderAjaxComponentExt = BX.Sale.OrderAjaxComponent;
 
    BX.Sale.OrderAjaxComponentExt.init = function (parameters) {
        initParent.apply(this, arguments);
 
        var editSteps = this.orderBlockNode.querySelectorAll('.bx-soa-editstep'), i;
        for (i in editSteps) {
            if (editSteps.hasOwnProperty(i)) {
                BX.remove(editSteps[i]);
            }
        }
 
    };
 
    BX.Sale.OrderAjaxComponentExt.getBlockFooter = function (node) {
        var parentNodeSection = BX.findParent(node, {className: 'bx-soa-section'});
 
        getBlockFooterParent.apply(this, arguments);
 
        if (/bx-soa-auth|bx-soa-properties|bx-soa-basket/.test(parentNodeSection.id)) {
            BX.remove(parentNodeSection.querySelector('.pull-left'));
            BX.remove(parentNodeSection.querySelector('.pull-right'));
        }
 
    };
 
 
    BX.Sale.OrderAjaxComponentExt.editOrder = function (section) {
 
        editOrderParent.apply(this, arguments);
 
        var sections = this.orderBlockNode.querySelectorAll('.bx-soa-section.bx-active'), i;
 
        for (i in sections) {
            if (sections.hasOwnProperty(i)) {
                if (!(/bx-soa-auth|bx-soa-properties|bx-soa-basket/.test(sections[i].id))) {
                    sections[i].classList.add('bx-soa-section-hide');
                }
            }
        }
 
        this.show(BX('bx-soa-properties'));
 
        this.editActiveBasketBlock(true);
 
        this.alignBasketColumns();
 
        if (!this.result.IS_AUTHORIZED) {
            this.switchOrderSaveButtons(true);
        }
 
    };
 
 
    BX.Sale.OrderAjaxComponentExt.initFirstSection = function (parameters) {
 
    };


    BX.Sale.OrderAjaxComponentExt.createDeliveryItem = function(item) {
        var checked = item.CHECKED == 'Y',
				deliveryId = parseInt(item.ID),
				labelNodes = [
					BX.create('INPUT', {
						props: {
							id: 'ID_DELIVERY_ID_' + deliveryId,
							name: 'DELIVERY_ID',
							type: 'checkbox',
							className: 'bx-soa-pp-company-checkbox',
							value: deliveryId,
							checked: checked
						}
					})
				],
				deliveryCached = this.deliveryCachedInfo[deliveryId],
				 label, title, itemNode;


			if (item.PRICE >= 0 || typeof item.DELIVERY_DISCOUNT_PRICE !== 'undefined')
			{
				labelNodes.push(
					BX.create('DIV', {
						props: {className: 'bx-soa-pp-delivery-cost'},
						html: typeof item.DELIVERY_DISCOUNT_PRICE !== 'undefined'
							? item.DELIVERY_DISCOUNT_PRICE_FORMATED
							: item.PRICE_FORMATED})
				);
			}
			else if (deliveryCached && (deliveryCached.PRICE >= 0 || typeof deliveryCached.DELIVERY_DISCOUNT_PRICE !== 'undefined'))
			{
				labelNodes.push(
					BX.create('DIV', {
						props: {className: 'bx-soa-pp-delivery-cost'},
						html: typeof deliveryCached.DELIVERY_DISCOUNT_PRICE !== 'undefined'
							? deliveryCached.DELIVERY_DISCOUNT_PRICE_FORMATED
							: deliveryCached.PRICE_FORMATED})
				);
			}

			label = BX.create('DIV', {
				props: {
					className: 'bx-soa-pp-company-graf-container'
					+ (item.CALCULATE_ERRORS || deliveryCached && deliveryCached.CALCULATE_ERRORS ? ' bx-bd-waring' : '')},
				children: labelNodes
			});

			if (this.params.SHOW_DELIVERY_LIST_NAMES == 'Y')
			{
				title = BX.create('DIV', {
					props: {className: 'bx-soa-pp-company-smalltitle'},
					text: this.params.SHOW_DELIVERY_PARENT_NAMES != 'N' ? item.NAME : item.OWN_NAME
				});
			}

			itemNode = BX.create('DIV', {
				props: {className: 'bx-soa-pp-company col-6'},
				children: [label, title],
				events: {click: BX.proxy(this.selectDelivery, this)}
			});
			checked && BX.addClass(itemNode, 'bx-selected');

			if (checked && this.result.LAST_ORDER_DATA.PICK_UP)
				this.lastSelectedDelivery = deliveryId;

			return itemNode;
    }
 
 
})();