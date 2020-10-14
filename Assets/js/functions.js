
let global_num_month = new Intl.DateTimeFormat('es-MX', {month: 'numeric'}).format(new Date())
let global_num_year = new Intl.DateTimeFormat('es-MX', {year: 'numeric'}).format(new Date())
let global_count = global_num_month
let global_margin = 0
let global_data = null
let global_chart = null
let global_data_modal = null
let month = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE']
let text_table = null

let limit  = 12
let chart = null

$(document).ready(function(){
	
	updateDatabase()
	
	
})


function updateDatabase(){
	simple_ajax('updateRegisters', { update: 'update' }, function(data){
		if(data){
			// let dete = Intl.DateTimeFormat('es-MX', {month: 'long', year: 'numeric', day: 'numeric'}).format(new Date(data))
			// $('#info-updete-database').html('Base de datos actualizada: '+dete)
		}else{
			// $('#info-updete-database').removeClass('good-message-update-data-base')
			// $('#info-updete-database').addClass('bad-message-update-data-base');
			// $('#info-updete-database').html('Ha ocurrido un error al intentar actualizar la base de datos: ')
		}
	})
}

function balanceDate(ctx, data, options){

	const {
		fechas,
		capital_pendiente,
		interes_pendiente,
		capital_abonado,
		interes_abonado
		// interes_pendiente	
	} = data

	chart = new Chart(ctx, {
		type: options.type,
		data: {
			labels: fechas.slice(global_margin,global_count).map(item => new Intl.DateTimeFormat('es-MX', {month: 'long', year: 'numeric'}).format(new Date(item.fecha))),
			datasets: [
				
				{
					label: 'CAPITAL PENDIENTE',
					data: capital_pendiente.slice(global_margin,global_count).map(item => item.monto),
					borderColor: '#00fff5',
					backgroundColor: '#00fff5'
				},

				{
					label: 'CAPITAL ABONADO',
					data: capital_abonado.slice(global_margin,global_count).map(item => item.monto),
					borderColor: 'green',
					backgroundColor: 'green'
				},

				{
					label: 'INTERES PENDIENTE',
					data: interes_pendiente.slice(global_margin,global_count).map(item => item.monto),
					borderColor: 'orange',
					backgroundColor: 'orange'
				},

				{
					label: 'INTERES ABONADO',
					data: interes_abonado.slice(global_margin,global_count).map(item => item.monto),
					borderColor: 'purple',
					backgroundColor: 'purple'
				}
				
				

				// {
				// 	label: 'Interes abonado',
				// 	data: interes_abonado.slice(global_margin,global_count).map(item => item.monto),
				// 	borderColor: 'green',
				// },
				
			]
		},
		options: {
			
			scales: {
				yAxes: [{
					
					gridLines:{
						display: false
					},

					beginAtZero: true,

                	callback: function(value, index, values) {
                    	return number_format(value)+' EUR';
                	}
				}]


			},
			title: {
				display: true,
				text: options.text,
				fontSize: 20,
				padding: 20,
				fontColor: '#212529',
				fontFamily: 'sans-serif',
				fontStyle: 'normal'
			},
			legend: {
				position: 'bottom',
				labels: { 
					padding: 20,
					boxWidth: 15,
					fontFamily: 'system-ui',
					fontColor: '#212529', 
					//usePointStyle: true 
				}
			},
			layout: {
				padding: {
					right: 50
				}
			},
			elements: {
				line: {
					borderWidth: 6,
					fill: false
				},
				point: {
					radius: 6,
					borderWidth: 6,
					backgroundColor: '#fff',
					hoverRadius: 12,
					hoverBorderWidth: 6
				}
			},
			tooltips: {
				
				titleFontSize: 20,
				titleMarginBottom: 10,
				xPadding: 20,
				yPadding: 20,
				bodyFontSize: 15,
				bodySpacing: 10,
				yAlign: 'bottom',
				fill: true,
				caretSize: false,
				mode: 'x',
				callbacks: {
		            label: function(tooltipItem, chart){
		                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
		                return datasetLabel + ': ' + number_format(tooltipItem.yLabel, 2)+' EUR';
		            }
		        }
			}
		}
	})

	//console.log(chart)
}


// tooltips: {
// 	callbacks: {
// 		labelColor: function ( tooltipItem, chart) {
// 			return {
// 				borderColor: 'rgb (255, 0, 0)', 
// 				backgroundColor: 'rgb (255, 0, 0)'
// 			};
// 		}, 
// 		labelTextColor: function (tooltipItem, chart) {
// 			return '# 543453' ;
// 		}
// 	}
// }


function renderCharts(data, options){
	
	if(typeof data != 'object'){
		data = JSON.parse(data)
	}
	
	data.fechas = data.fechas.sort((a, b) => a.fecha > b.fecha)

	//console.log(data)
	global_data = data

	if($("#lineChartDemo").get(0) != undefined){
		const ctx = $("#lineChartDemo").get(0).getContext("2d");
		balanceDate(ctx, data, options)
	}
}

function changeChartsTime(){

	$('#times-chart').on('change', function(e){
		switch(e.target.value){
			case '0': 
				
				global_count = global_num_month
				global_margin = 0
				text_table = 'DE '+month[global_margin]+' A '+month[global_count-1]//+' DEL '+global_num_year

				chart.destroy()

				renderCharts(global_data, {
				    type: 'line',
				    text: text_table,
				})
			break;
			case '1': 

				global_count = 4
				global_margin = 0
				text_table = 'DE '+month[global_margin]+' A '+month[global_count-1]//+' DEL '+global_num_year
				
				chart.destroy()
				

				renderCharts(global_data, {
				    type: 'line',
				    text: text_table,
				})
				chart.update()
			break;
			case '2': 
				
				global_count = 8
				global_margin = 4
				text_table = 'DE '+month[global_margin]+' A '+month[global_count-1]//+' DEL '+global_num_year
				
				chart.destroy()
				
				renderCharts(global_data, {
				    type: 'line',
				    text: text_table,
				})
				chart.update()
			break;
			case '3': 
				
				// if(global_num_month % 4 == 1){
				// 	global_count = 8 
				// 	$($('#times-chart')[0][5]).remove()
				// }

				// else {
				// 	global_count = 12
				// }
				global_count = 12
				global_margin = 8
				text_table = 'DE '+month[global_margin]+' A '+month[global_count-1]+' DEL '+global_num_year

				chart.destroy()

				renderCharts(global_data, {
				    type: 'line',
				    text: text_table,
				})
				chart.update()
			break;
			
		}
	})
}

function setOptionsDataTables(options){

	let spanish = {

      
      oPaginate: {
        sPrevious: 'Pagina anterior',
        sFirst: 'Inicio',
        sLast: 'Ir al final',
        sNext: 'Siguiente'  
      },

      
      rowReorder: {
        update: true
      },

      sLengthMenu: 'Mostrar _MENU_ registros',
      sEmptyTable: 'No existen registros.',
      sInfoEmpty: 'No hay registros que mostrar...',
      //sInfoFiltered:  - Total _MAX_,
      sInfo: 'Mostrando _START_ de _END_ - total _TOTAL_ registros',
      sLoadingRecords: 'Por favor espere - Cargando...',
      sProcessing: 'Procesando datos...',
      sSearch: 'Filtrar registros:',
      sSearch: 'Filtrar _INPUT_',
      sZeroRecords: 'No hay registros que mostrar.'

    }

	table = $('#sampleTable').DataTable({
		order: [[ 6, "desc" ]],
		pageLength: options.pageLength,
    	lengthMenu: options.lengthMenu,
	    oLanguage: spanish,   
	})

	//table.order([0, 'desc']).draw();
}

function openModal(modal, data){
	$('#'+modal).modal('show')
	global_data_modal = data
	modal = eval(modal+'()')	
}

function modalEditClient(){
	
	$('#formEditUser').find($('#name')).val(global_data_modal.name)
	$('#formEditUser').find($('#full_name')).val(global_data_modal.full_name)
	$('#formEditUser').find($('#phone')).val(global_data_modal.phone)
	$('#formEditUser').find($('#interest')).val(global_data_modal.interest)
	$('#formEditUser').find($('#code')).val(global_data_modal.id_customer)
}

function deleteClient(id_code){
	verificationNotify({
		msg_top_warning: 'No podra recuperar los datos!',
		text_btn_confirm: 'eliminar',
		text_btn_cancel: 'cancelar eliminar',
		callback: function(){
			admin_ajax('deleteClient', {id_code: id_code}, {
				id_code: id_code,
				msg_header_confirm: 'Eliminado',
				msg_body_confirm: 'El cliente con codigo ['+id_code+'] fue eliminado',
				msg_body_error: 'Ha ocurrido un error al intentar eliminar.',
				confirm_button_text: 'OK',
				callback: reloadPage
			})
		}
	})
}

function admin_ajax(method, params, options){


	$.ajax({
		url: base_url()+'/adminajax',
		type: 'POST',
		data: {
			request: {
				method: method,
				params: params
			}
		},
		beforeSend: function(){
			//Loader...
			loader()
		},
		success: function(response){
			hideLoader()
			if(response.status == 'OK'){
				confirmNotify({
					title: options.msg_header_confirm,
					text: response.message,
					confirm_button_text: options.confirm_button_text,
					callback: options.callback
				})
			}else if(response.status == 'KO'){
				errorNotify({
					title: 'Error',
					text: response.message
				})
			}else{
				if(method == 'login'){
					errorNotify({
						title: 'Error',
						text: 'Acceso denegado'
					})
				}
				
			}

		},
		complete: function(response){
			//REFRESH...
			//callback()
		}
	})

}

function simple_ajax(method, params, callback){
	
	//if(base_url().split('/')[6] != 'code' && base_url() != 'http://localhost:8888/PROYECTOS_WEB/PRESTAMOS/login'){

		$.ajax({
			url: base_url()+'/adminajax',
			type: 'POST',
			data: {
				request: {
					method: method,
					params: params
				}
			},
			beforeSend: function(){
				//Loader...
				loader()
			},
			success: function(response){
				hideLoader()
				if(response.status == 'OK'){
					callback(response.data)
				}else if(response.status == 'KO'){

					callback(response.data)
					errorNotify({
						title: 'Error',
						text: response.message
					})
				}else{
					if(method == 'login'){
						errorNotify({
							title: 'Error',
							text: 'Acceso denegado'
						})
					}
					
				}

			},
			complete: function(response){
				//REFRESH...
				//callback()
			}
		})
	//}
}

function reloadPage(){
	window.location.reload()
}

function redirectDashboard(){
	user = true
	window.location.href = base_url()+'/dashboard'
}

function redirectLogin(){
	window.location.href = base_url()+'/login'
}

function loader(){
	$('body').append('<div class="spinner-loader-content"><div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>')
	// Swal.fire({
	// 	title: 'Procesando',
	// 	text: 'Por favor espere...',
	// 	icon: 'info',
	// 	showConfirmButton: false
	// });
}

function hideLoader(){
	$('.spinner-loader-content').remove()
}


function verificationNotify(options){

	Swal.fire({
  		
  		title: "Estas seguro?",
  		text: options.msg_top_warning,
  		icon: "warning",
  		showCancelButton: true,
  		cancelButtonText: "No, "+options.text_btn_cancel,
  		confirmButtonText: "Si, "+options.text_btn_confirm+'!'

  	}).then((result) => {
	  
	  if(result.isConfirmed){
	    options.callback()
	  }

	})  	
}

function confirmNotify(options){
	Swal.fire({
		title: options.title,
		text: options.text,
		icon: 'success',
		confirmButtonText: options.confirm_button_text,
		onClose: options.callback
	})
}

function errorNotify(options){
	Swal.fire({
		title: options.title,
		text: options.text,
		icon: 'error'
	})
}

function base_url(){
    
    let u = document.location.href.split("/");
    let n = u.length;
    let _url = "http:";
    let i = 0;
    
    n = n -3;

    for(i = 0; i <= n; i++){
        _url += "/" + u[i+1];
    }

    return _url
}

function number_format(number, decimals, dec_point, thousands_sep) {

    number = (number + '').replace(',', '').replace(' ', '');
    let n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
        let k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
    };
    
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function login(form){
	
	let email = $(form).find($('#user')).val()
	let passw = $(form).find($('#passw')).val()

	admin_ajax('login', { email: email, passw: passw }, {
		msg_header_confirm: 'Acceso concedido',
		msg_body_confirm: 'Acceda al panel.',
		msg_body_error: 'El usuario o la contraseña no son correctos.',
		confirm_button_text: 'ENTRAR',
		callback: redirectDashboard
	})

}

function logout(){
	verificationNotify({
		msg_top_warning: 'Seguro que decea salir?',
		text_btn_confirm: 'Salir',
		text_btn_cancel: 'Cancelar',
		callback: function(){
			admin_ajax('logout', {
				msg_header_confirm: 'Sesion cerrada con extito',
				msg_body_confirm: 'Salir al inicio.',
				msg_body_error: 'Ha ocurrido un error al intentar cerrar sesion.',
				confirm_button_text: 'OK',
				callback: redirectLogin
			})
		}
	})	
}

function addNewUser(form){

	let name = $(form).find($('#name')).val()
	let full_name = $(form).find($('#full_name')).val()
	let phone = $(form).find($('#phone')).val()
	let code = $(form).find($('#code')).val()

	verificationNotify({
		msg_top_warning: 'Confirme',
		text_btn_confirm: 'añadir cliente',
		text_btn_cancel: 'Cancelar',
		callback: function(){
			admin_ajax('addNewClient',{
				name: name,
				full_name: full_name,
				phone: phone,
				code: code,
				interest: 10
			},{
				msg_header_confirm: 'Cliente añadido',
				msg_body_confirm: 'El nuevo cliente ha sido añadido correctamente.',
				msg_body_error: 'Ha ocurrido un error al intentar añadir el cliente.',
				confirm_button_text: 'OK',
				callback: reloadPage
			})
		}
	})

}

function addNewLoan(form){

	let name = $(form).find($('#name')).val()
	let initial_loan = $(form).find($('#initial_loan')).val()
	let interest = $(form).find($('#interest')).val()
	let code = $(form).find($('#code')).val()

	verificationNotify({
		msg_top_warning: 'Confirme',
		text_btn_confirm: 'prestar',
		text_btn_cancel: 'Cancelar',
		callback: function(){
			admin_ajax('addNewLoan',{
				name: name,
				full_name: 'Undefined',
				phone: 'Undefined',
				initial_loan: initial_loan,
				interest: interest,
				code: code
			},{
				msg_header_confirm: 'Prestamo añadido',
				msg_body_confirm: 'El nuevo cliente ha sido añadido correctamente con su nuevo prestamo.',
				msg_body_error: 'Ha ocurrido un error al intentar realizar el prestamo.',
				confirm_button_text: 'OK',
				callback: reloadPage
			})
		}
	})

}

function oldLoan(form){

	let option = $(form).find($('#code_exists'))
	let name = $(option).get(0).options[$(option).get(0).selectedIndex].innerText
	let initial_loan = $(form).find($('#initial_loan_exists')).val()
	let interest = $(form).find($('#interst_exists')).val()
	let code = $(form).find($('#code_exists')).val()

	verificationNotify({
		msg_top_warning: 'Confirme',
		text_btn_confirm: 'prestar',
		text_btn_cancel: 'Cancelar',
		callback: function(){
			admin_ajax('addExistsLoan',{
				name: name,
				initial_loan: initial_loan,
				interest: interest,
				code: code
			},{
				msg_header_confirm: 'Prestamo añadido',
				msg_body_confirm: 'El su cliente ha aumentado su deuda.',
				msg_body_error: 'Ha ocurrido un error al intentar realizar el prestamo.',
				confirm_button_text: 'OK',
				callback: reloadPage
			})
		}
	})
}

function chargeMoney(form){

	let option = $(form).find($('#client'))
	let mount = $(form).find($('#mount')).val()
	let name = $(option).get(0).options[$(option).get(0).selectedIndex].innerText
	let code = $(form).find($('#client')).val()

	if(code != 'null'){
		verificationNotify({
			msg_top_warning: 'Confirme',
			text_btn_confirm: 'Abonar dinero',
			text_btn_cancel: 'Cancelar',
			callback: function(){
				admin_ajax('chargeMoney',{
					name: name,
					mount: mount,
					code: code
				},{
					msg_header_confirm: 'Abono realizado',
					msg_body_confirm: 'Has abonado el dinero de la deuna de tu cliente.',
					msg_body_error: 'Ha ocurrido un error al intentar realizar el abono.',
					confirm_button_text: 'OK',
					callback: reloadPage
				})
			}
		})
	}else{
		errorNotify({
			title: 'Error',
			text: 'Seleccione una opcion valida.'
		})

		$('#client').focus()
	}
}

function searchCode(){
	let valueCode = $('#value-code').val()
	simple_ajax('searchCode',{ code: valueCode }, function(data){
		$('#client').html('<option value="'+data.code+'">'+data.val+'</option>')
		$('#code_exists').html('<option value="'+data.code+'">'+data.val+'</option>')
	})
}

$('form').submit(function(e){
   	
   	e.preventDefault()
   	e.stopPropagation()

   	let Elem = e.target;
   	let ElemId = $(Elem).attr('id');

   	switch(ElemId){
   		case 'login-form' : login(Elem); break;
   		case 'new-client-form' : addNewUser(Elem); break;
   		case 'new-loan-form' : addNewLoan(Elem); break;
   		case 'old-loan-form' : oldLoan(Elem); break;
   		case 'charge-form' : chargeMoney(Elem); break;	
   		case 'wallet-plus' : walletPlus(Elem); break;
   		case 'wallet-rest' : walletRest(Elem); break;
   		case 'formEditUser' : editClient(Elem); break;
   	}
})

function editClient(form){
	
	let name = $(form).find($('#name')).val()
	let full_name = $(form).find($('#full_name')).val()
	let phone = $(form).find($('#phone')).val()
	let interest = $(form).find($('#interest')).val()
	let code = $(form).find($('#code')).val()

	simple_ajax('editClient',{
		name: name,
		full_name: full_name,
		phone: phone,
		interest: interest,
		code: code
	}, function(data){
		confirmNotify({
			title: 'Cliente actualizado',
			text: 'Los datos del cliente han sido actualizados correctamente.',
			icon: 'success',
			confirm_button_text: 'OK',
			onClose: null
		})
	})
}

function walletPlus(form){
	let mount = $(form).find($('#plus-wallet')).val()
	simple_ajax('walletPlus',{ mount: mount }, function(data){
		confirmNotify({
			title: 'Cartera actualizada',
			text: 'Su cartera a sido actualizada',
			icon: 'success',
			confirm_button_text: 'OK',
			onClose: null
		})
	})
}

function walletRest(form){
	let mount = $(form).find($('#rest-wallet')).val()
	simple_ajax('walletRest',{ mount: mount }, function(data){
		confirmNotify({
			title: 'Cartera actualizada',
			text: 'Su cartera a sido actualizada',
			icon: 'success',
			confirm_button_text: 'OK',
			onClose: null
		})
	})
}

$('#logout-btn').on('click', function(e){
	logout()
})

$('#search-code').on('click', function(e){
	searchCode()
})

// $('#login-form').on('submit', function(e){
// 	e.preventDefault()
// 	login(e.target)
// })

// $('#new-client-form').on('submit', function(e){
// 	e.preventDefault()
// 	addNewUser(e.target);
// })

// $('#new-loan-form').on('submit', function(e){
// 	e.preventDefault()
// 	addNewLoan(e.target);
// })

// $('#old-loan-form').on('submit', function(e){
// 	e.preventDefault()
// 	oldLoan(e.target);
// })

// $('form#charge-form').on('submit', function(e){
// 	e.preventDefault()
// 	chargeMoney(e.target)
// })



















