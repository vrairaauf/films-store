AOS.init();
paypal.Buttons({
	style:{

	},
	createOrder:function(data, actions){
		return actions.order.create({
			purchase_units:[{
				amount:{
					value:'0.1'
				}
			}]
		})
	},
	onApprove:function(data, actions){
		return actions.order.capture().then(function (details){
			console.log(details)
		})
	}
}).render('#paypal-payement-button');
