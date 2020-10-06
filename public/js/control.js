$(function () {
    'use strict'

    //-------------------------------functional|Area-------------------------------->

    $(document).ready(function () {

        let click = false;

        if (click === false){
            let _div = document.getElementById('panel');
            _div.parentNode.removeChild(_div);
        }

        $(".magnifying_glass").click(function (e){
                e.preventDefault();

            click = true;

            const query = $('#x').val();
            const client_id ='HzjMOoWV3hBTF7_RI87tgdoVymWFWFFR2vSM3Rwl3dE';
            const uri = `https://api.unsplash.com/search/photos?per_page=30&client_id=${client_id}&query=${query}&orientation=landscape`

            if ( query ===  null){

            }

            fetch(uri,{
                    method:'GET',
                    mode:'cors',
                    cache:'no-cache',
                    credentials:'same-origin',
                    headers:{
                        'Content-Type':'application/json'
                    }
                }).then(function (res){
                    return res.json();
                }).then(function (res){
                    console.log(res.results);

                    let array = res.results;

                    if(isEmptyArray(array)){
                        let result =`
                            <p style="text-align: center; transform: translateY(15rem); color: #5a6268; opacity: 50%;
                            font-family: Open Sans, sans-serif; font-weight: bold; font-size: 20pt">
                            No records were founded
                            </p>
                        `;

                        d_e(920).then(function (){
                            document.getElementById("wrapper_layer").innerHTML=result;
                        })

                    }else{
                        console.log("fail");

                        res.results.forEach(photo => {
                            let result = `
                          <figure>
                            <img class="gallery__img animate__bounceIn" src="${photo.urls.regular}">
                          </figure>
                        `;

                            d_e(1500).then(function (){
                                $(".preloader").addClass("animate__bounceOut");
                                $(".dim-contents").addClass("_hidden");
                                $("#unsplash").append(result);
                            })
                        })
                    }
                })

            if (click === true){
                $(closeSearch());
                d_e(2000).then($(openBoard()));
            }
        })

        $('#guest').click(function (e) {
            e.preventDefault();

        })

        function openBoard(){
            let my_image = ``;
            let my_image_panel = ``;
            let width ;

            let status = getCookie("status");

            if (status === "logged-in"){
                my_image = `<li id="e" class="nav-item mx-2">
                               <a class="nav-link" data-toggle="tab" href="#pane_4" role="tab" aria-controls="pane_4" aria-selected="false">My Photos</a>
                            </li>`;
                my_image_panel = `<div id="pane_4" class="tab-pane" role="tabpanel" aria-labelledby="pane_4_tab">
                                    <div id="my_photo" class="gallery">
                                        <p>There is no data recently. It's still in beta</p>
                                     </div>
                                  </div>`;
                console.log('yes');
            }

            if (status == null){
                my_image = ``;
                console.log('nope');
            }

            if (/Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor)){
                width = `123%;`;
            }else{
                width = `121%;`;
            }

            let panel =`
             <div id="panel" class="container-fluid ds_window animate__bounceIn">
                <div id="innerPanel" class="row" style="height: 100%;">
                    <div class="col-2" style="background: white; border-radius: 7px 0 0 7px">
                        <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="transform: translateX(-15px);
                            width: ${width}">
                          <i id="_close" class="fad fa-times-circle close" style="font-size: 14pt; float: left; margin-top: 12px; transform: translate(7px,-20px);width: 20px;height: 20px;"></i>
                          <a class="nav-link active" id="v-pills-image-tab" data-toggle="pill" href="#v-pills-image" role="tab" aria-controls="v-pills-image" aria-selected="true"
                          style="border-radius: 0; font-size: 14pt;">
                             <i class="fas fa-image mx-2" style="font-size: 14pt; color: black"><spa></spa></i>
                             Image
                          </a>
                          <a class="nav-link" id="v-pills-video-tab" data-toggle="pill" href="#v-pills-video" role="tab" aria-controls="v-pills-video" aria-selected="false"
                          style="border-radius: 0; font-size: 14pt;">
                            <i class="fas fa-play-circle mx-2" style="font-size: 14pt; color: black;"></i>
                            Video
                          </a>
                          <a class="nav-link" id="v-pills-arts-tab" data-toggle="pill" href="#v-pills-arts" role="tab" aria-controls="v-pills-arts" aria-selected="false"
                          style="border-radius: 0; font-size: 14pt;">
                            <i class="fas fa-pencil-paintbrush mx-2" style="font-size: 14pt; color: black;"></i>
                            Arts
                          </a>
                          <a class="nav-link" id="v-pills-discover-tab" data-toggle="pill" href="#v-pills-discover" role="tab" aria-controls="v-pills-discover" aria-selected="false"
                          style="border-radius: 0; font-size: 14pt;">
                            <i class="fas fa-compass mx-2" style="font-size: 14pt; color: black;"></i>
                            Discover
                          </a>
                        </div>
                    </div>
                        <div id="wrapper_layer" class="col-10 flex-wrap position-relative" style="overflow-y: scroll;overflow-x: hidden;border-radius: 0 7px 7px 0; max-height: 80vh;scrollbar-color: gray transparent;max-width: 84%;">
                        <div id="overlay" class="dim-contents">
                           <img class="preloader" src="../assets/spinner/pre-loader.svg">
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade show active" id="v-pills-image" role="tabpanel" aria-labelledby="v-pills-image-tab">
                              <nav class="py-3 navbar navbar-dark justify-content-end">
                                  <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item mx-2">
                                      <a class="nav-link" data-toggle="tab" href="#pane_1" role="tab" aria-controls="pane_1" aria-selected="false">Blog</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                      <a class="nav-link active" data-toggle="tab" href="#pane_2" role="tab" aria-controls="pane_2" aria-selected="true">Unsplash</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                      <a class="nav-link" data-toggle="tab" href="#pane_3" role="tab" aria-controls="pane_3" aria-selected="false">Pexelbay</a>
                                    </li>
                                     ${my_image}
                                </ul>
                            </nav>
                           <div class="tab-content">
                               <div id="pane_1" class="tab-pane" role="tabpanel" aria-labelledby="pane_1_tab">
                                   <div id="blog" class="gallery">
                                     <p>There is no data recently. It's still in beta</p>
                                   </div>
                               </div>
                                <div id="pane_2" class="tab-pane active" role="tabpanel" aria-labelledby="pane_2_tab">
                                  <div id="unsplash" class="gallery"></div>
                               </div>
                                <div id="pane_3" class="tab-pane" role="tabpanel" aria-labelledby="pane_3_tab">
                                  <div id="pexel_bay" class="gallery">
                                    <p>There is no data recently. It's still in beta</p>
                                  </div>
                               </div>
                               ${my_image_panel}
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-video" role="tabpanel" aria-labelledby="v-pills-video-tab">
                            <p>Culpa dolor voluptate do laboris laboris irure reprehenderit id incididunt duis pariatur mollit aute magna pariatur consectetur. Eu veniam duis non ut dolor deserunt commodo et minim in quis laboris ipsum velit id veniam. Quis ut consectetur adipisicing officia excepteur non sit. Ut et elit aliquip labore Lorem enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit qui esse anim eiusmod do sint minim consectetur qui.</p>
                          </div>
                          <div class="tab-pane fade" id="v-pills-arts" role="tabpanel" aria-labelledby="v-pills-arts-tab">
                            <p>Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui magna. Ad proident laboris ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit nostrud magna nulla. Velit et et proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est magna commodo est ea veniam consectetur.</p>
                          </div>
                          <div class="tab-pane fade" id="v-pills-discover" role="tabpanel" aria-labelledby="v-pills-discover-tab">
                            <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur elit id dolor proident in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do. Aliqua amet qui mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet. Culpa ullamco sit adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                          </div>
                        </div>
                     </div>
                 </div>`;

            d_e(1000).then(function (){
                document.getElementById('View').innerHTML = panel;
            })
        }

        function openSearch(){
            let search = `<div id="hcraes" class="search animate__bounceIn">
                <form method="GET">
                    <input id="x" class="r" type="text" name="name" placeholder="Search your favorite places"/>
                    <button name="search" class="magnifying_glass">
                        <label class="q">
                            <svg id="search" viewBox="0 0 36.379 36.379"><path d="M18.158,3a15.158,15.158,0,1,0,9.583,26.884l9.05,9.05a1.516,1.516,0,1,0,2.144-2.144l-9.05-9.05A15.142,15.142,0,0,0,18.158,3Zm0,3.032A12.126,12.126,0,1,1,6.032,18.158,12.1,12.1,0,0,1,18.158,6.032Z" transform="translate(-3 -3)" fill="rgba(178,175,175,0.74)" /></svg>
                        </label>
                    </button>
                </form>
            </div>`;

            d_e(1000).then(function (){
                document.getElementById('View').innerHTML = search;
            })
            d_e(1100).then(function (){
                window.top.location = window.top.location;
            })
        }

        function d_e(dl){
            return new Promise(resolve => {
                setTimeout(()=>{
                    resolve(2);
                }, dl);
            })
        }

        function closeSearch(){
            $('.search').addClass('animate__bounceOut');
            $(openBoard());
        }

        function closeBoard(){
            $('.ds_window').removeClass('animate__bounceIn').addClass('animate__bounceOut');
            $(openSearch());
        }

        function getCookie(name){
            const arr = document.cookie.split(";");
            for(let i = 0; i < arr.length; i++){
                let cookieElement = arr[i].split("=");
                if(name == cookieElement[0].trim()){
                    return decodeURIComponent(cookieElement[1]);
                }
            }
            return null;
        }

        function isEmptyArray(array){
            return array.every(function (el){
                return $.isEmptyObject(el);
            })
        }


        function iteration(){
            const max_fields = Math.pow(10,1000);
            let wrapper = $()
        }

        $(document).click(function (event) {
            const click_over = $(event.target);
            if (click_over.hasClass("close")) {
                $(closeBoard());
            }
        })

        //-------------------------------Non functional|Area-------------------------------->

        $(document).click(function (event) {
            const click_over = $(event.target);
            const $navbar = $(".navbar-collapse");
            const _open = $navbar.hasClass("show");

            if (_open === true && !click_over.hasClass("navbar-toggler")) {
                $navbar.collapse('hide');
            }
        })
        $(document).click(function (event) {
            const click_over = $(event.target);
            const $navbar = $(".dropdown-menu");
            const _open = $navbar.hasClass("show");

            if (_open === true && !click_over.hasClass("dropdown-menu")) {
                $navbar.collapse('hide');
            }
        })
    })
})
