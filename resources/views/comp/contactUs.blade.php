<div class="ContactUs mb-4 " id="contactus">

    <div class="theForm w-75 ">
        <h2 class="text-success mt-3 mb-5">CONTACT US</h2>

        <form id="contactForm" name="sentMessage">
            <div class="control-group w-75">
                <div class=" form-floating controls pb-2"><input class="form-control shadow rounded-3" type="text"
                        id="name" required="" placeholder="Name"><label class="form-label">Name</label><small
                        class="form-text text-danger"></small></div>
            </div>
            <div class="control-group w-75">
                <div class=" form-floating controls pb-2"><input class="form-control shadow rounded-3" type="email"
                        id="email" required="" placeholder="Email Address"><label class="form-label">Email
                        Address</label><small class="form-text text-danger"></small></div>
            </div>
            <div class="control-group w-75">
                <div class=" form-floating controls pb-2"><input class="form-control shadow rounded-3" type="tel"
                        id="phone" required="" placeholder="Phone Number"><label class="form-label">Phone
                        Number</label><small class="form-text text-danger"></small></div>
            </div>
            <div class="control-group w-75">
                <div class="mb-2 form-floating controls pb-2"><textarea class="form-control shadow rounded-3"
                        id="message" required="" placeholder="Message" style="height: 150px;"></textarea><label
                        class="form-label">Message</label><small class="form-text text-danger"></small></div>
            </div>
            <div id="success"></div>
            <div><button class="btn btn-success btn-xl w-75 shadow rounded-3" id="sendMessageButton"
                    type="submit">SEND</button></div>
        </form>
    </div>

</div>