@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    .statusLoad {
        display: block;
        margin-top: 5px;
        font-weight: bold;
    }

    .active {
        color: green;
    }

    .inactive {
        color: red;
    }

    .on-leave {
        color: orange;
    }
</style>


<div class="page-content">

        
        <div class="row profile-body">
          
         
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Add Payment to {{ $casualemployees->name }}</h2>
                        <h3 class="card-title">From : {{ $departmentName }}</h3>
                        <hr>   

                            <form method="POST" action="{{ route('update.casual.payment')}}" class="forms_sample">
                                @csrf
                                {{-- the id is hidden --}}
                                <input type="hidden" name="casualpayments_id" value="{{ $casualpayments->id }}"> 
                                <input type="hidden" name="department_id" value="{{ $department_id }}"> 
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Hire Date : </label>
                                            {{-- <input type="text" name="dateOfBirth" class="form-control" value="{{ $profileData->dateOfBirth }}"> --}}
                                            <input type="text" id="date" name="date" class="form-control bg-transparent border-primary flatpickr-input " placeholder="Select date" data-input="" readonly="readonly">
                                   

                                        </div>
                                    </div><!-- Col -->
                                                                        
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Payment Status : </label>
                                        <div>
                                            
                                            

                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="payment_status" id="payment_status" value="pending" {{ $casualpayments->payment_status === 'pending' ? 'checked' : '' }} >
                                                <label class="form-check-label" for="payment_status">
                                                    Pending
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="payment_status" id="payment_status2" value="done"  {{ $casualpayments->payment_status === 'done' ? 'checked' : '' }} >
                                                <label class="form-check-label" for="payment_status2">
                                                    Done
                                                </label>
                                            </div>
                                        
                                            
                                        </div>
                                        </div>
                                    </div><!-- Col -->
                                                                         
                                </div><!-- Row --> 

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="mb-3">
                                            <label class="form-label">Payment Date : </label>
                                            {{-- <input type="text" name="dateOfBirth" class="form-control" value="{{ $profileData->dateOfBirth }}"> --}}
                                            <input type="text" id="payment_date" name="payment_date" class="form-control bg-transparent border-primary flatpickr-input " placeholder="Select date" data-input="" readonly="readonly" >

                                        </div>
                                    </div><!-- Col -->
                                                                        
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Rate : </label>
                                            <input type="text" name="rate" id="rate" class="form-control  @error('rate') is-invalid @enderror" 
                                            value="{{ $casualpayments->rate }}" >
                                            @error('rate')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror       
                                        </div>
                                    </div><!-- Col -->
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Number of days : </label>
                                            <input type="text" name="number_of_days" id="number_of_days" class="form-control  @error('number_of_days') is-invalid @enderror"
                                            value="{{ $casualpayments->number_of_days }}" >
                                            @error('number_of_days')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div><!-- Col -->
                                </div>

                                {{-- <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-inverse-success" onclick="calculateAmount()">Calculate Amount</button>
                                        </div>
                                    </div><!-- Col -->
                                </div> --}}

                                {{-- <div class="row">

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Amount:</label>
                                            <input type="text" name="amount" id="amount" class="form-control" readonly>
                                        </div>
                                    </div><!-- Col -->

                                </div> --}}
                                
                                                             
                    
                                <button type="submit" class="btn btn-primary submit">Save Changes</button>

                            </form>
                    </div>
                </div>
              
            </div>
          </div>
          <!-- middle wrapper end -->
         
        </div>

			</div>


{{-- for the date  --}}
<script>
    // Initialize flatpickr without inline mode
    flatpickr('#payment_date', {
        dateFormat: 'Y-m-d', // Set the date format
        defaultDate: "{{ $casualpayments->payment_date }}", // Set the default date
        onChange: function(selectedDates, dateStr, instance) {
            // Update the input field value with the selected date
            instance.element.value = dateStr;
        }
    });
</script>





<script>
    // Initialize flatpickr without inline mode
    flatpickr('#date', {
        dateFormat: 'Y-m-d', // Set the date format
        defaultDate: "{{ $casualpayments->date }}", // Set the default date
        onChange: function(selectedDates, dateStr, instance) {
            // Update the input field value with the selected date
            instance.element.value = dateStr;
        }
    });
</script>

{{-- For the image  --}}
<script type="text/javascript"> 
$(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});

</script>

<script>
    function calculateAmount() {
        // Get the rate and number of days values
        var rate = parseFloat(document.getElementById('rate').value);
        var numberOfDays = parseFloat(document.getElementById('number_of_days').value);
        
        // Calculate the amount
        var amount = rate * numberOfDays;
        
        // Update the amount input field with the calculated value
        document.getElementById('amount').value = isNaN(amount) ? '' : amount.toFixed(2);
    }
</script>

@endsection