<div class="mt-5 row">
    <div class="m-auto col-xl-6">

{{--Session Message--}}
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif


    {{--   Form Starts Here      --}}

        <form wire:submit="saveContactForm" action="">

            <div class="shadow card">
                <div class="card-header">
                    <h4 class="card-title"> Contact Form </h4>
                </div>


                <div class="card-body">
                    {{-- Name --}}
                    <div class="mb-2 form-group">
                        <label for="name">Name</label>
                        <input wire:model.live="name" type="text" id="name" class="form-control" placeholder="Your Name"/>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{--Email--}}
                    <div class="mb-2 form-group">
                        <label for="email">Email</label>
                        <input wire:model.live="email" type="text" id="email" class="form-control" placeholder="Your Email"/>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{--Phone Number--}}
                    <div class="mb-2 form-group">
                        <label for="phone_number">Phone Number</label>
                        <input wire:model.live="phoneNumber" type="text" id="phone_number" class="form-control" placeholder="Your Phone Number"/>
                        @error('phoneNumber')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{--Message--}}
                    <div class="mb-2 form-group">
                        <label for="message">Message</label>
                        <textarea wire:model.live="message" id="message" class="form-control" placeholder="Your Message here.." ></textarea>
                        @error('message')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{--Nationality Dropdown--}}
                    <div class="mb-2 form-group">
                        <label for="nationality">Nationality</label>
                        <select wire:model="nationality" class="form-select" id="nationality">

                            <option value="">Select Nationality</option>
                            <option value="india">India</option>
                            <option value="usa">USA</option>
                            <option value="uk">UK</option>
                            <option value="australia">Australia</option>

                        </select>
                        @error('nationality')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{--Check Box--}}
                    <div class="mt-3 form-group">
                        <div class="d-flex">
                            <label>Gender:</label>

                                <div class="form-check ms-2">
                                    <label class="form-check-label" for="male">Male</label>
                                    <input  wire:model="gender" name="gender" type="radio" id="male" class="form-check-input"/>
                                </div>

                                <div class="form-check ms-2">
                                    <label class="form-check-label" for="female">Female</label>
                                    <input wire:model="gender" name="gender" type="radio" id="female" class="form-check-input"/>
                                </div>
                        </div>

                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    {{--News Letter--}}
                    <div class="form-group d-flex">

                        <div class="form-check">
                            <label class="form-check-label" for="newsletter">Subscribe to our News Letter</label>
                            <input wire:model="newsletter" value="yes" type="checkbox" id="newsletter" class="form-check-input"/>
                        </div>

                    </div>


                </div>

                <div class="card-footer">

                    {{--Button--}}
                    <button type="submit" class="btn btn-success">Submit</button>


                </div>

            </div>
        </form>
{{--      Form Ends Here       --}}

    </div>

</div>
