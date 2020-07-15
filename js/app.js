
const currentLocation = location.href;

const link = document.getElementsByClassName('sidebar-link');

for(var i=0; i<=3; i++){
	if(link[i].href === currentLocation){
		link[i].className = "active";
	}
}
