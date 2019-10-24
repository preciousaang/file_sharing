<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a href="" class="navbar-brand">File Sharing</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
           
        </ul>
        <div class="dropdown-divider"></div>

        <form action="" method="get" class="form-inline my-2 my-lg-0">
            @csrf
            <input name="search" required class="form-control mr-sm-2" type="search" placeholder="Search" value="{{request()->get('search')}}" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="dropdown-divider"></div>
        <ul class="navbar-nav mr-3">
          
        </ul>

    </div>
</nav>
<div style="margin-top: 70px;"></div>