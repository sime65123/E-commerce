 <div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>
            @if ($this->totalProductAmount != '0')
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Item Total Amount :
                                <span class="float-end"><b>{{  $this->totalProductAmount }} Fcfa</b></span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 3 - 5 days.</small>
                            <br/>
                            <small>* Tax and other charges are included ?</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Basic Information
                            </h4>
                            <hr>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Full Name</label>
                                        <input type="text" wire:model.defer="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" />
                                        @error('fullname')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Phone Number</label>
                                        <input type="number" wire:model.defer="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Email Address</label>
                                        <input type="email" wire:model.defer="email" id="email" class="form-control" placeholder="Enter Email Address" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Pin-code (Zip-code)</label>
                                        <input type="number" wire:model.defer="pincode" id="pincode" class="form-control" placeholder="Enter Pin-code" />
                                        @error('pincode')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Full Address</label>
                                        <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3" wire:ignore>
                                        <label>Select Payment Mode: </label>
                                        <div class="d-md-flex align-items-start">
                                            <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                                <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                            </div>
                                            <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                    <h6>Cash on Delivery Mode</h6>
                                                    <hr/>
                                                    <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary">
                                                        <span wire:loading.remove wire:target="codOrder">
                                                            Place Order (Cash on Delivery)
                                                        </span>
                                                        <span wire:loading wire:target="codOrder">
                                                            Placing Order
                                                        </span>
                                                    </button>

                                                </div>
                                                <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                    <h6>Online Payment Mode</h6>
                                                    <hr/>
                                                    {{-- <button wire:loading.attr="disabled" type="button" class="btn btn-warning">
                                                        <span wire:loading.remove wire:target="codOrder">
                                                            Pay Now (Online Payment)
                                                        </span>
                                                        <span wire:loading wire:target="codOrder">
                                                            onlinePayment Order
                                                        </span>
                                                    </button> --}}
                                                    <div>
                                                        <div id="paypal-button-container"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card card-body shadow text-center p-md-5">
                    <h4 class="alert alert-warning">
                        <p> No Items In Cart To Checkout </p>
                        <a href="{{ url('collections') }}">
                            Shop Now
                        </a>
                    </h4>
                </div>
            @endif
        </div>
    </div>

</div>

@push('scripts')

<script src="https://www.paypal.com/sdk/js?client-id=AW7JmFKJXAIhqVMcvxK2PuHh-jXMmyoCoQ5HD8vjuE5SCCZ0kNUMzbX70q-TZFJSS29TNeiYXsbRwztW&currency=USD"></script>
    <script>
        paypal.Buttons({
            onClick: function()  {

                // Show a validation error if the checkbox is not checked
                if (!document.getElementById('fullname').value
                    || !document.getElementById('phone').value
                    || !document.getElementById('email').value
                    || !document.getElementById('pincode').value
                    || !document.getElementById('address').value
                )
                {
                    Livewire.emit('validationForAll');
                    return false;
                }else{

                    @this.set('fullname', document.getElementById('fullname').value);
                    @this.set('phone', document.getElementById('phone').value);
                    @this.set('email', document.getElementById('email').value);
                    @this.set('pincode', document.getElementById('pincode').value);
                    @this.set('address', document.getElementById('address').value);
                }
            },
          // Order is created on the server and the order id is returned
          createOrder: (data, actions) => {
              return actions.order.create({
                  purchase_units: [{
                      amount: {
                          value: "{{ $this->totalProductAmount }}"
                      }
                  }],
              });
          },
          // Finalize the transaction on the server after payer approval
          OnApprove: (data, actions) => {
    return actions.order.capture().then(function(orderData) {
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
        if (transaction.status === "COMPLETED") {
            return Livewire.emit('transactionEmit', transaction.id)
                .then(() => {
                    // Rediriger vers la page de remerciements après l'émission de l'événement
                    window.location.href = '/Thanks-You';
                })
                .catch((error) => {
                    console.error('Error emitting transactionEmit:', error);
                    // Gérer les erreurs éventuelles lors de l'émission de l'événement
                });
        } else {
            // Gérer les cas où la transaction n'est pas complétée
            console.error('Transaction not completed:', transaction);
        }
    }).catch((error) => {
        console.error('Error capturing order:', error);
        // Gérer les erreurs éventuelles lors de la capture de la commande
    });
}

        }).render('#paypal-button-container');
      </script>
@endpush
