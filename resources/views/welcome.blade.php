@extends("layouts.app")

@section("content")
<script>
            const loggedIn = {{ auth()->check() ? 'true' : 'false' }};
            if (loggedIn)
            {
                setCookie("status","logged-in")
                console.log("LoggedIn")
            }else{
                document.cookie="status=";
            }

            function setCookie(name, value){
                const cookie = name + "=" + encodeURIComponent(value);
                document.cookie = cookie
            }

</script>

<img id="h1021">

<section id="View">
      <div id="hcraes" class="search">
                <form method="GET">
                    <input id="x" class="r" type="text" name="name" placeholder="Search your favorite places"/>
                    <button type="submit" name="search" class="magnifying_glass">
                        <label class="q">
                            <svg id="search" viewBox="0 0 36.379 36.379"><path d="M18.158,3a15.158,15.158,0,1,0,9.583,26.884l9.05,9.05a1.516,1.516,0,1,0,2.144-2.144l-9.05-9.05A15.142,15.142,0,0,0,18.158,3Zm0,3.032A12.126,12.126,0,1,1,6.032,18.158,12.1,12.1,0,0,1,18.158,6.032Z" transform="translate(-3 -3)" fill="rgba(178,175,175,0.74)" /></svg>
                        </label>
                    </button>
                </form>
            </div>
            <!--Alias-->
      <div id="panel" class="container-fluid ds_window" style="display: none"></div>
</section>
@endsection

