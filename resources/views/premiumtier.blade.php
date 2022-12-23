@extends('layout.mainlayout')
@section('content')

	<style type="text/css">
		.hide{
			display: none;
		}
	</style>

	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="page-title">Add Card Details</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="holiday.html">Plans</a></li>
							<li class="breadcrumb-item active">Add Card Details</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-sm-12">

					<div class="card">
						<div class="card-body">
							<div class="col-12 error hide">
								<div class='alert-danger alert'>Please correct the errors and try again.</div>
							</div>
							@if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                             @endif

                             @if (Session::has('error'))
                                <div class="alert alert-danger text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('error') }}</p>
                                </div>
                             @endif
							<form 
								role="form"
                                action="{{ route('stripe.post') }}"
                                method="post"
                                class="require-validation"
                                data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                id="payment-form"
								autocomplete='off'
							>
								@csrf
								<input type="hidden" name="plantype" value="Premium">
								<div class="row">
									<div class="col-12">
										<h5 class="form-title"><span>Card Information</span></h5>
									</div>
									<div class="col-12 col-sm-6">  
										<div class="form-group required">
											<label>Name on Card</label>
											<input type="text" name="cardname" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group required">
											<label>Card Number</label>
											<input type="text" name="cardnumber" class="form-control card-number">
										</div>
									</div>
									<!-- <div class="col-12 col-sm-6">
										<div class="form-group required">
											<label>Type of Plan</label>
											<select class="form-control" name="plantype" id="plantype">
												<option>Select Plan</option>
												<option>Premium</option>
												<option>Basic</option>
											</select>
										</div>
									</div> -->
									<div class="col-12 col-sm-4">
										<div class="form-group required">
											<label>CVC</label>
											<input type="text" name="cvc" class="form-control card-cvc">
										</div>
									</div>
									<div class="col-12 col-sm-4">
										<div class="form-group required">
											<label>Expiration Month</label>
											<input type="text" name="expire_month" class="form-control card-expiry-month" placeholder='MM'>
										</div>
									</div>
									<div class="col-12 col-sm-4">
										<div class="form-group required">
											<label>Expiration Year</label>
											<input type="text" name="expire_year" class="form-control card-expiry-year" placeholder='YYYY'>
										</div>
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-primary">Pay Now ($12)</button>
									</div>
								</div>
							</form>
						</div>
					</div>							
				</div>					
			</div>					
		</div>				
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
	  	$(document).ready(function () {

	      	$('#payment-form').validate({
	      		rules: {
	      			cardname: {
	      				required: true
	      			},
	      			cardnumber: {
	      				required: true
	      			},
	      			cvc: {
	      				required: true
	      			},
	      			expire_month: {
	      				required: true
	      			},
	      			expire_year: {
	      				required: true
	      			},
	      		},
	      		
	      		messages: {
	      			cardname: {
	      				required: "Card Name is required."  
	      			},
	      			cardnumber: {
	      				required: "Card Number is required."  
	      			},
	      			cvc: {
	      				required: "CVC is required."  
	      			},
	      			expire_month: {
	      				required: "Expire Month is required."  
	      			},
	      			expire_year: {
	      				required: "Card Number is required."  
	      			}
	      		}
	      	});

	  	});
	</script>

	<script type="text/javascript">
		$(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
	</script>

@endsection