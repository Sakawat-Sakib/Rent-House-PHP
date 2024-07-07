//MENU BAR OPEN CLOSE
let menuBar = document.querySelector('#menu_bar');
let menuBox = document.querySelector('.menu_box');
const urlRoot = 'http://localhost/KingSizeProject/bashalagbe';

menuBar.addEventListener('click',()=>{
	menuBox.classList.toggle('active');
})

//LOGIN LOGOUT BOX
let logBox = document.querySelector('.login_logout_box');
let userBtn = document.querySelector('.fa-user');

userBtn.addEventListener('click',()=>{
	logBox.classList.toggle('active');
})



// Active To Deactive && Deactive To Active


function changeStatus(statusBtn){
	
		event.preventDefault();

		let id = statusBtn.getAttribute("data-id");
		let table = statusBtn.getAttribute("data-table");
		
		let action = '';

		let clsName = statusBtn.className;
		let clsAry = clsName.split(" ");
		
		if(clsAry.indexOf("activeBtn") !== -1){

			action = 'deactive';
			statusBtn.classList.remove('activeBtn');
			statusBtn.classList.add('deactiveBtn');
			statusBtn.innerText = 'Deactive';

		}else if(clsAry.indexOf("deactiveBtn") !== -1){

			action = 'active';
			statusBtn.classList.remove('deactiveBtn');
			statusBtn.classList.add('activeBtn');
			statusBtn.innerText = 'Active';
		}

		fetch(`${urlRoot}/admin/statusChange/${id}/${action}/${table}`)
		.then(res => res.json())
		.then((data)=>{
			
		})



		
}


//DELETE SINGLE ROW
function deleteData(deleteBtn){
	event.preventDefault();

	let id = deleteBtn.getAttribute("data-id");
	let table = deleteBtn.getAttribute("data-table");

	fetch(`${urlRoot}/admin/deleteRow/${id}/${table}`)
	.then(res => res.json())
	.then((data)=>{

		deleteBtn.parentNode.parentNode.remove()
		
	})


}



function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}



