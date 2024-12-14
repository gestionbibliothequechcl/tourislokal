<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
            </li> -->
            <li><a href="widget-basic.html" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                class="nav-text">Dashboard</span></a></li>

            @can('view permissions') 
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-single-04"></i><span class="nav-text">Permissions</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('list.permission')}}">List</a></li>
                        <li><a href="{{route('create.permission')}}">Create</a></li>
                    </ul>
                </li>
            @endcan 

            @can('view roles')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                    class="icon icon-single-04"></i><span class="nav-text">Roles</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('list.roles')}}">List</a></li>
                        <li><a href="{{route('create.roles')}}">Create</a></li>
                    </ul>
                </li>
             @endcan

             @can('view users')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                    class="icon icon-single-04"></i><span class="nav-text">Users</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('users.list')}}">List</a></li>
                        <li><a href="{{route('create.users')}}">Create</a></li>
                    </ul>
                </li>
             @endcan

             @can('view categories')
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                    class="icon icon-single-04"></i><span class="nav-text">Category</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('category.index')}}">List</a></li>
                        <li><a href="{{route('category.create')}}">Create</a></li>
                    </ul>
                </li>
             @endcan

             @can('view articles')
             <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                 class="icon icon-single-04"></i><span class="nav-text">Articles</span></a>
                 <ul aria-expanded="false">
                     <li><a href="{{route('post.index')}}">List</a></li>
                     <li><a href="{{route('post.create')}}">Create</a></li>
                 </ul>
             </li>
          @endcan

          @can('view socials_media')
          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
              class="icon icon-single-04"></i><span class="nav-text">Social Media</span></a>
              <ul aria-expanded="false">
                  <li><a href="{{route('social_media.index')}}">List</a></li>
                  <li><a href="{{route('social_media.create')}}">Create</a></li>
              </ul>
          </li>
       @endcan

       @can('view settings')
       <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
           class="icon icon-single-04"></i><span class="nav-text">Settings</span></a>
           <ul aria-expanded="false">
               <li><a href="{{route('setting.index')}}">View</a></li>
           </ul>
       </li>
    @endcan
            
        </ul>
    </div>
</div>