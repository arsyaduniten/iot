<div class="container mx-auto flex m-2">
	<a href="{{ route('backend:home') }}" class="text-black font-bold no-underline p-4">Home</a>
	<a href="{{ route('backend:users') }}" class="text-black font-bold no-underline p-4">Profile</a>
	{{-- <div>
		<button class="text-black font-bold no-underline p-4">Educations</button>
		<div>
			<a href="{{ route('backend:educations') }}" class="text-black font-bold no-underline p-4">Educations</a>
			<a href="{{ route('backend:educations') }}" class="text-black font-bold no-underline p-4">Educations</a>
		</div>
	</div> --}}
	<div class="dropdown">
	  <button class="dropbtn">Blog</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:blogs') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:blog:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
	<div class="dropdown">
	  <button class="dropbtn">Research Areas</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:researches') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:research:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
	<div class="dropdown">
	  <button class="dropbtn">Projects</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:projects') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:project:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
	<div class="dropdown">
	  <button class="dropbtn">Colleagues</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:researchers') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:researcher:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
	<div class="dropdown">
	  <button class="dropbtn">Collaboration</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:collaborators') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:collaborator:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
	<div class="dropdown">
	  <button class="dropbtn">Funding</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:fundings') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:funding:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
	<div class="dropdown">
	  <button class="dropbtn">Publications</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:publications') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:publication:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
	<div class="dropdown">
	  <button class="dropbtn">Awards</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:awards') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:award:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
	<div class="dropdown">
	  <button class="dropbtn">Gallery</button>
	  <div class="dropdown-content">
	    	<a href="{{ route('backend:galleries') }}" class="text-black font-bold no-underline p-4">All</a>
			<a href="{{ route('backend:gallery:create') }}" class="text-black font-bold no-underline p-4">Add New</a>
	  </div>
	</div>
</div>