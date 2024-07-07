//block unblock
let stateBtns = document.querySelectorAll('.stateBtn');

stateBtns.forEach((stateBtn)=>{
	stateBtn.addEventListener('click',(e)=>{
		e.preventDefault();

		let id = stateBtn.dataset.id;
		let table = 'users';
		
		let action = '';

		let clsName = stateBtn.className;
		let clsAry = clsName.split(" ");
		
		if(clsAry.indexOf("block") !== -1){

			action = 'unblock';
			stateBtn.classList.remove('block');
			stateBtn.classList.add('unblock');
			stateBtn.innerText = 'Unblocked';

		}else if(clsAry.indexOf("unblock") !== -1){

			action = 'block';
			stateBtn.classList.remove('unblock');
			stateBtn.classList.add('block');
			stateBtn.innerText = 'blocked';
		}

		fetch(`${urlRoot}/admin/stateChange/${id}/${action}`)
		.then(res => res.json())
		.then((data)=>{
			
		})
  			
	})

})