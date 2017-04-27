var testApp = angular.module('testApp', ['datatables'])
testApp.controller('ServerSideProcessingCtrl', ServerSideProcessingCtrl);

// ServerSideProcessingCtrl
// Get registered credit/debit card data and render into Angular's datatable

function ServerSideProcessingCtrl($scope, $compile, DTOptionsBuilder, DTColumnBuilder) {
	// Initialize
	var vm = this;
	vm.currency = "S/.";
	vm.current = {};
	// Functions to render info in datatable
    vm.renderer = {
    	productType:function (data, type, charge, meta) {
	    	var pType;
	    	switch(charge.product){
	    		case 'web': pType = 'fa fa-laptop'; break;
	    		case 'token': pType = 'fa fa-codepen'; break;
	    	}
	        return '<span class="productType-made" title='+charge.product+'>' +
	            '   <i class="'+pType+'"></i>' +
	            '</span>'
	    },
	    productMeta:function (data, type, charge, meta) {
	        return '<span class="productMeta-made" title="Venta">' +
	            '  Venta '+
	            '</span>'
	    },
	    amount:function (data, type, charge, meta) {
	    	var formatted = charge.amount / 100;
	    	formatted += ( charge.amount % 100 == 0)?".00":"";
	    	return '<b>' + vm.currency +' '+ formatted + '</b>';
	    },
	    referenceCode:function (data, type, charge, meta) {
	    	return (charge.reference_code != null)?charge.reference_code:'-';
	    },
	    client:function (data, type, charge, meta) {
	    	return charge.client.first_name +' '+ charge.client.last_name;
	    },
	    tokenBrand:function (data, type, charge, meta) {
			var tBrand;
			switch(charge.token.brand_name.toLowerCase()){
				case 'visa': tBrand = 'visa.png'; break;
				case 'mastercard': tBrand = 'mastercard.png'; break;
			}
		    return '<span class="tokenBrand-made" title='+charge.token.brand_name+'>' +
		        '   <img src="dist/img/cards/'+tBrand+'"></i>' +
		        '</span>'
	    },
	    date:function (data, type, charge, meta) {
	    	var timestamp = charge.date;
	    	var dt = new Date(timestamp);
	    	var datePieces = [
	    		dt.getFullYear(),
	    		((dt.getMonth()+1) < 10 ? "0" : "") + (dt.getMonth()+1),
	    		(dt.getDate() < 10 ? "0" : "") + dt.getDate()
	    	]
	    	var hourPieces = [
	    		(dt.getHours() < 10 ? "0" : "") + dt.getHours(),
	    		(dt.getMinutes() < 10 ? "0" : "") + dt.getMinutes(),
	    		(dt.getSeconds() < 10 ? "0" : "") + dt.getSeconds()
	    	]
	    	return  datePieces.join('/')+' '+hourPieces.join(':');
	    },
	    state:function (data, type, charge, meta) {
	    	var stateClass;
	    	switch(charge.state.toLowerCase()){
	    		case 'rechazada': stateClass = 'state-failed'; break;
	    		case 'exitosa': stateClass = 'state-success'; break;
	    	}
	        return '<span class="state-made '+stateClass+'" title='+charge.state+'>' +
	            	charge.state +
	            '</span>'
	    },
	    fraudScore:function (data, type, charge, meta) {
	    	return  '<div class="progressFraudScore" id="progressFraudScore-' + meta.row+ '"></div>';
	    }
    }
    // Functions to render info in modal-detail
    vm.formatModal = {
    	date:function (data) {
    		if(data == undefined ) return false;

    		var timestamp = data;
    		var dt = new Date(timestamp);
    		var datePieces = [
    			dt.getFullYear(),
    			((dt.getMonth()+1) < 10 ? "0" : "") + (dt.getMonth()+1),
    			(dt.getDate() < 10 ? "0" : "") + dt.getDate()
    		]
    		var hourPieces = [
    			(dt.getHours() < 10 ? "0" : "") + dt.getHours(),
    			(dt.getMinutes() < 10 ? "0" : "") + dt.getMinutes(),
    			(dt.getSeconds() < 10 ? "0" : "") + dt.getSeconds()
    		]
    		return  datePieces.join('/')+' '+hourPieces.join(':');
    	},
    	state:function (data) {
    		if(data == undefined ) return false;

    		var stateClass;
    		switch(data.toLowerCase()){
    			case 'rechazada': stateClass = 'state-failed'; break;
    			case 'exitosa': stateClass = 'state-success'; break;
    		}
    	    return stateClass
    	},
    	amount:function (data) {
    		if(data == undefined ) return false;

	    	var formatted = data / 100;
	    	formatted += ( data % 100 == 0)?".00":"";
	    	return vm.currency +' '+ formatted;
	    },
        tokenBrand:function (data, type, charge, meta) {
        	if(data == undefined ) return false;

    		var tBrand;
    		switch(data.toLowerCase()){
    			case 'visa': tBrand = 'visa.png'; break;
    			case 'mastercard': tBrand = 'mastercard.png'; break;
    		}
    	    return tBrand;
        }
    }
    // Functions to build & bind plugins
    vm.actions = {
    	openDetail:function ( charge ){
    		vm.current = charge;
    		$("#charge-detail").modal('show');
	    },
	    bindPlugins:function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
	    	// Listen on row click
	        $('td', nRow).unbind('click');
	        $('td', nRow).bind('click', function() {
	            $scope.$apply(function() {
	                vm.actions.openDetail(aData);
	            });
	        });
	        // Build Progres after render
	        $scope.$apply(function(){
	        	setTimeout(function(){
	        		vm.actions.buildProgressCircle( $(nRow).find('.progressFraudScore').attr('id') , aData.fraud_score );
	        	},200);
	        });
	    },
	    buildProgressCircle( obj , percent ){

	    	var circle = new ProgressBar.Circle("#"+obj, {
	    	  color: '#333',
	    	  strokeWidth: 7,
	    	  trailWidth: 7,
	    	  easing: 'easeInOut',
	    	  duration: 1000,
	    	  text: {
	    	    autoStyleContainer: false
	    	  },
	    	  from: { color: '#ff0', width: 7 },
	    	  to: { color: '#f00', width: 7 },
	    	  step: function(state, circle) {
	    	    circle.path.setAttribute('stroke', state.color);
	    	    circle.path.setAttribute('stroke-width', state.width);
	    	    var value = Math.round(circle.value() * 100);
	    	    if (value === 0) {
	    	      circle.setText('');
	    	    } else {
	    	      circle.setText(value);
	    	    }

	    	  }
	    	});
	    	circle.text.style.fontFamily = '"GothamRounded-Light", Helvetica, sans-serif';
	    	circle.text.style.fontSize = '14px';
	    	circle.text.style.fontWeight = 'bold';

	    	circle.animate( percent/100 );  // Number from 0.0 to 1.0
	    } 
    }
    // Config datatable options
    vm.dtOptions = DTOptionsBuilder.newOptions()
        .withOption('ajax', {
			//url: 'ws.controller.php',
			url: 'data.json',
			type: 'POST'
    	})
    	.withDataProp('data')
			.withOption('processing', true)
			.withOption('serverSide', true)
			.withOption('pageLength', 10)
			.withOption('ordering', false)
			.withOption('searching',false)
			.withOption('rowCallback', vm.actions.bindPlugins)
			.withOption('sDom','<"top"ip>rt<"bottom"p><"clear">')
			.withOption('language', language)
			.withOption('scrollX', true)
			.withPaginationType('numbers');
    // Set columns for datatable
    vm.dtColumns = [
         DTColumnBuilder.newColumn('product').withTitle("").renderWith(vm.renderer.productType),
         DTColumnBuilder.newColumn('productMeta').withTitle("").renderWith(vm.renderer.productMeta),
         DTColumnBuilder.newColumn('amount').withTitle('Monto').renderWith(vm.renderer.amount),
         DTColumnBuilder.newColumn('reference_code').withTitle('Nro. Pedido / <br> Cód Referencia').renderWith(vm.renderer.referenceCode),
         DTColumnBuilder.newColumn('client.first_name').withTitle('Cliente').renderWith(vm.renderer.client),
         DTColumnBuilder.newColumn('token.brand_name').withTitle('Marca').renderWith(vm.renderer.tokenBrand),
         DTColumnBuilder.newColumn('token.card_number').withTitle('Tarjeta'),
         DTColumnBuilder.newColumn('state').withTitle('Estado').renderWith(vm.renderer.state),
         DTColumnBuilder.newColumn('date').withTitle('Fecha y Hora').renderWith(vm.renderer.date),
         DTColumnBuilder.newColumn('fraud_score').withTitle('Fraude').renderWith(vm.renderer.fraudScore),
         
    ];

}
