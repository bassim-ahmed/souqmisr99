<main id="main">
        <section class="register">
            <form wire:submit.prevent="placeOrder">
                <div class="form-group">
                    <label for="F-name">F-Name</label>
                    <input type="text" class="form-control" id="F-name" aria-describedby="nameHelp" wire:model="firstname">
                    @error ('firstname') <p>{{$message}}<p> @enderror
                  </div>
                  <div class="form-group">
                    <label for="L-Name">L-Name</label>
                    <input type="text" class="form-control" id="L-name" aria-describedby="nameHelp" wire:model="lastname">
                    @error ('lastname') <p>{{$message}}<p> @enderror
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="email">
                  @error ('email') <p>{{$message}}<p> @enderror
                
                </div>
                <div class="form-group">
                  <label for="Phone-number">Phone number</label>
                  <input type="number" class="form-control" id="Phone-number" wire:model="mobile">
                  @error ('mobile') <p>{{$message}}<p> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Line1</label>
                    <input type="text" class="form-control" id="Adress" wire:model="line1">
                    @error ('line1') <p>{{$message}}<p> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">Line2</label>
                    <input type="text" class="form-control" id="Adress" wire:model="line2">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword2">country</label>
                    <input type="text" class="form-control" id="Adress" wire:model="country"> 
                    @error ('country') <p>{{$message}}<p> @enderror
                  </div>
                  <div class="form-group">
                    <label for="Town/City">Province</label>
                    <input type="text" class="form-control" id="Town/City" wire:model="province">
                    @error ('province') <p>{{$message}}<p> @enderror
                  </div>
                  <div class="form-group">
                    <label for="Town/City">Town/City</label>
                    <input type="text" class="form-control" id="Town/City" wire:model="city">
                    @error ('city') <p>{{$message}}<p> @enderror
                  </div>

                  <div class="form-group">
                    <label for="Town/City">PostCode</label>
                    <input type="number" class="form-control" id="PostCode" wire:model="zipcode">
                    @error ('zipcode') <p>{{$message}}<p> @enderror
                  </div>

                  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Payment Methods</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="cod" checked wire:model="paymentmode">
          <label class="form-check-label" for="gridRadios1">
            Cash On Delivery
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="card" disabled wire:model="paymentmode">
          <label class="form-check-label" for="gridRadios3">
            Debit/Credit Card
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="paypal" disabled wire:model="paymentmode">
          <label class="form-check-label" for="gridRadios3">
            Paypal
          </label>
          @error ('paymentmode') <p>{{$message}}<p> @enderror
        </div>
      </div>
    </div>
  </fieldset>
               
                <button type="submit" class="btn btn-primary bg-secondary ">Place Order Now</button>
              </form>
            
        </section>


    </main>
