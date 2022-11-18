<div class="main-content">

<div class="row">
    <div class="card rounded">
        <div class="card-header">
            <h4 class="fw-bold">Facial Recognition</h4>
            <hr>
        </div>

        <div class="card-body">

        <div class="row">

            <div class="col-lg-6 col-md-7">
                <div id="my_camera">
            
                </div>
                <br>
                <div id="results" style="visibility:hidden; position:absolute">
            
                </div>
                <br>
                <button class="btn btn-primary "onclick="saveSnap()">Capture Identity</button>
            </div>

            <div class="col-lg-6 col-md-5">
                <div class="card d-flex flex-column align-items-center shadow rounded">
                    <h4 class="my-2" id="sid">School ID: </h4>
                    <div id="aw" class="col-12 d-flex justify-content-center p-5 my-5">
                        <!-- <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>                        -->
                    </div>
                    
                    <h5 class="fw-bold my-2" id="name">Name: </h4>
                    <h5 class="text-primary my-2 fw-semibold" id="match">
                        
                    </h5>
                    <h5 class="text-success my-2" id="status"></h5>
                </div>
            </div>


        </div>


        </div>
    </div>
</div>


<?php $ew = $Users?>
<script src="<?=base_url('assets/js/webcam.min.js')?>"></script>
<script>
    var awit = <?php echo json_encode($ew)?>
</script>
<script defer>
    const sid = document.getElementById("sid");
    const name = document.getElementById("name");
    const match = document.getElementById("match");
    const status = document.getElementById('status');
    const image_source = document.getElementById("image_source");

    function configure(){
        Webcam.set({
            width: 480,
            height:360,
            image_format: 'jpeg',
            jpeg_quality: 100
        });


        Webcam.attach('#my_camera');
    }

    function saveSnap()
    {
        Webcam.snap(function(data_uri){
            document.getElementById('results').innerHTML = 
         '<img id="webcam" src="'+data_uri+'">';
        });


        var base64image = document.getElementById("webcam").src;
        // Webcam.upload(base64image, 'https://www.recogu.ml:5001/image', function(code,text){
        //     alert('Save success');
        // });
        $.ajax({
            url: 'http://localhost:8000/image',
            type: 'post',
            data: { image:base64image},
            success:function(response){
                toDataURL('http://localhost:8000/image', function(dataurl){
                    // console.log('RESULT:', dataurl)
                    document.getElementById("aw").innerHTML = `<img id="image_source" src="${dataurl}" class="rounded my-2" height="200px" style="object-fit: contain">`; 
                    // console.log('response');
                    get();
                })
            },
            complete:function(response){
                console.log('complete');
                document.getElementById("aw").innerHTML = 
                `<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>`; 
                sid.innerHTML = "School ID:"
                name.innerHTML = `Name: `;
                match.innerHTML = "";
                status.innerHTML = "";
            }
          });

        
    }


    function get()
    {
        
        $.ajax({
            url: 'http://localhost:8000/show_person',
            type: 'get',
            success:function(response){
                for(let i = 0; i < awit.length; i++)
                {
                    if(awit[i].userID == response.userid[0])
                    {
                        sid.innerHTML =`School ID: ${awit[i].userID}`
                        name.innerHTML = `Name: ${awit[i].fname} ${awit[i].mname} ${awit[i].lname}`;
                        match.innerHTML = `Match Score: ${response.accuracy[0]}`;
                        status.innerHTML = "Status: PRESENT";
                        insert_data(awit[i].userID);
                    }
                }
            }
          });
    }


    function insert_data(id)
    {
        $.ajax({
            url: '<?=site_url('Security/insert_gate_log')?>',
            type: 'post',
            data: {userID: id} ,
            success:function(response){
                console.log(response);
            }
        });
    }

    // function load_model()
    // {
    //     $.ajax({
    //         url: 'http://localhost:8000/load_model',
    //         type: 'get',
    //         success:function(response){
    //             console.log("Model Refreshed");
    //         }
    //     });
    // }






    function toDataURL(url, callback) {
        var xhr = new XMLHttpRequest();
        xhr.onload = function() {
            var reader = new FileReader();
            reader.onloadend = function() {
            callback(reader.result);
            }
            reader.readAsDataURL(xhr.response);
        };
        xhr.open('GET', url);
        xhr.responseType = 'blob';
        xhr.send();
    }
    // load_model()
    configure()
</script>
<!-- <script defer>
    const sid = document.getElementById("sid");
    const username = document.getElementById("username");
    const image_source = document.getElementById("image_source");
    const status = document.getElementById('status');
    var awit = <?php echo json_encode($ew)?>


    
    function do_ajax()
    {
        $.ajax({
            url: "http://localhost:8000/message",
            type: "GET",
            dataType: "json",
            jsonpCallback: 'processJSONPResponse',
            contentType: "application/json; charset=utf-8",
            crossDomain:true,
            success: function(data){
                for(let i = 0; i < awit.length; i++)
                {
                    if(awit[i].userID == data.Data)
                    {
                        sid.innerHTML = awit[i].userID
                        username.innerHTML = `${awit[i].fname} ${awit[i].mname} ${awit[i].lname}`
                        image_source.innerHTML = `<img class="rounded" src="<?=base_url()?>uploads/${awit[i].avatar}" alt="" height="200px" style="object-fit: contain">`
                        status.innerHTML = 'Present'
                        do_query();
                    }
                }
            },
            error: function(xhr, status, error){
                console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
            }
        });
    }

    function do_query(){

        $.ajax({
            url: "http://localhost:8000/gatelog",
            type: "GET",
            dataType: "json",
            jsonpCallback: 'processJSONPResponse',
            contentType: "application/json; charset=utf-8",
            crossDomain:true,
            success: function(data){
                console.log("success");
            },
            error: function(xhr, status, error){
                console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
            }
        });
    };




 

    setInterval(function() {
        do_ajax();
        test();
    }, 3000)

    setInterval(function(){
        do_ajax()
    }, 3000)

    function gatelog_insert(id)
    {
        $.ajax({
            url: `<?=base_url("security/gatelog_insert/")?>${id}`,
            type:'post',
            data:{userID: id},
            success:function(response)
            {
                console.log(id);
            }
        })
    }

</script> -->