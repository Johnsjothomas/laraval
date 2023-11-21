
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search by filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">

          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#Skills" role="tab" aria-controls="pills-home" aria-selected="true">Skills</a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#Industry" role="tab" aria-controls="pills-profile" aria-selected="false">Industry</a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#Experience" role="tab" aria-controls="pills-contact" aria-selected="false">Experience</a>
          </li>

          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#Location" role="tab" aria-controls="pills-home" aria-selected="true">Location</a>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">



          <!---Skills-->
          <div class="tab-pane fade show active mt-2" id="Skills" role="tabpanel" 
          aria-labelledby="pills-home-tab">

          <h5 class="mb-2">Search Required Skills </h5>
          <div class="form-input">
            <span class="icon_field"><i class="fa fa-search" aria-hidden="true"></i></span>
            <input class="input_field"type="email" name="email" placeholder="Enter your email">
          </div>
          
          <button class="btn btn-success mt-3 mr-2">
            
            <i class="fa fa-bookmark-o" aria-hidden="true"></i>
           Leadership development</button><button class="btn btn-success mt-3 mr-2">
            
            <i class="fa fa-bookmark-o" aria-hidden="true"></i>
           Project Managment</button><br><button class="btn btn-success mt-3 mr-2">
            
            <i class="fa fa-bookmark-o" aria-hidden="true"></i>
           Team Managment</button>
          <button class="btn btn-success mt-3 mr-2">
            
            <i class="fa fa-bookmark-o" aria-hidden="true"></i>
           Event Managment</button>

          <h5 class="mt-3">Suggested Skills </h5>

          <button class="btn bluebtn mt-3 mr-2">+ Project Managment</button><button class="btn bluebtn mt-3 mr-2">+ Team Managment</button><br><button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Event Managment</button>
          <button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Finace Managment</button><button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Operations</button><br>

          <button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Sales</button><button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Marketing</button>
          <button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Bussiness Development</button><br>

          <button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Design</button><button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Research</button><button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ information and Managment</button><br>
          <button class="btn bg-transparent btn-outline-dark mt-3 mr-2">+ Software Testing</button>
         </div>
         <!---/Skills-->


         <!---Industry-->
          <div class="tab-pane fade" id="Industry" role="tabpanel" aria-labelledby="pills-profile-tab">

            <h5 class="mb-2">Search Industry</h5>
            <div class="form-input">
              <span class="icon_field"><i class="fa fa-search" aria-hidden="true"></i></span>
              <select class="form-control input_field">
                                  <option value="" disabled selected>Select Industry</option>
                                  <option value="Oil & construction">Oil & construction</option>
                                  <option value="Construction">Construction</option>
                                  <option value="Power & Utilities">Power & Utilities</option>
                                  <option value="Petrochemical">Petrochemical</option>
                                  <option value="Renewable Energy">Renewable Energy</option>
                                  <option value="Manufacturing & processing">Manufacturing & processing</option>
                                  <option value="Mining">Mining</option>
                                  <option value="Marine">Marine</option>
                                  <option value="Chemical">Chemical</option>
                                  <option value="Others">Others</option>
            </select>
            </div>
          


          </div>
         <!---/Industry-->



          <!-----Experience------->
          <div class="tab-pane fade" id="Experience" role="tabpanel" aria-labelledby="pills-contact-tab">
            
            <h5 class="mb-2">Search Required Experience</h5>
            <div class="form-input">
              <span class="icon_field"><i class="fa fa-search" aria-hidden="true"></i></span>
              <select class="form-control input_field" name="total_experience">
            <option value="" disabled selected>Select your option</option>
            <option value="<1 Year">1 Year</option>
            <option value="1-3">1-3</option>
            <option value="3-5">3-5</option>
            <option value="5-10">5-10</option>
            <option value="10>">10></option>
            </select>
            </div>
          </div>
          <!-----/Experience------->


          <!-----Location------->
          <div class="tab-pane fade" id="Location" role="tabpanel" aria-labelledby="pills-contact-tab">
            <h5 class="mb-2">Search Required Location</h5>
            <div class="form-input">
              <span class="icon_field"><i class="fa fa-search" aria-hidden="true"></i></span>
              <input class="input_field"type="text" name="" placeholder="Enter Location">
            </div>
         
          </div>
          <!-----/Location------->

        </div>
        
        <br><br>
        <center>
          <button type="button" class="btn bluebtn btn-center pl-5 pr-5">Apply</button>
          <button type="button" class="btn whitebtn btn-center pl-5 pr-5" data-dismiss="modal">Cancel</button>
        </center>
      
      </div>
      
    </div>
  </div>
</div>