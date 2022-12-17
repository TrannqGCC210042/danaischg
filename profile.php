<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">Edogaru</span>
                <span class="text-black-50">edogaru@mail.com.my</span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Username</label>
                        <input type="text" class="form-control" placeholder="" name="username" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">First Name</label>
                        <input type="text" class="form-control" placeholder="" name="firstName" value="">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Last Name</label>
                        <input type="text" class="form-control" value="" name="lastName" placeholder="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Birthday</label>
                        <input type="text" class="form-control input--style-1 js-datepicker" placeholder="" name="birthday">
                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Gender</label>
                        <br>
                        <select name="gender" class="form-control">
                            <option disabled="disabled" value="2" selected>Choose gender</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Telephone</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-12 my-3">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address</label>
                        <input type="text" class="form-control" placeholder="" value="">
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Change Password</h4>
                </div>
                <div class="col-md-12">
                    <label class="labels">Old Password</label>
                    <input type="text" class="form-control" placeholder="experience" value="">
                </div>
                <div class="col-md-12 my-3">
                    <label class="labels">New Password</label>
                    <input type="text" class="form-control" placeholder="additional details" value="">
                </div>
                <div class="col-md-12 my-3">
                    <label class="labels">Confirm Password</label>
                    <input type="text" class="form-control" placeholder="additional details" value="">
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>