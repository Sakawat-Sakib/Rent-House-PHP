let urlRoot = 'http://localhost/KingSizeProject/bashalagbe';
let userAdContainer = document.querySelector('#user_ad_list')
let uid = document.querySelector(".uid").value

function approvedAds(btn){
	let uid = btn.dataset.id
	let className = ''
	let btnTxt = ''
	let packType = ''

	fetch(`${urlRoot}/users/apprvAds/${uid}`)
	.then(res => res.json())
	.then((data)=>{

		if(data.message == "Not Found"){

			userAdContainer.innerHTML = null

			userAdContainer.innerHTML = `
						<div class="notfound_box">
							<i class="far fa-frown"></i>
							<p>You have no approved ad yet.</p>
						</div>
					`

		}else{

			userAdContainer.innerHTML = null

			data.forEach((ad)=>{

				if(ad.booked == 0){
					className = 'available_btn'
					btnTxt = 'Available'
				}else{
					className = 'booked_btn'
					btnTxt = 'Booked'
				}

				if(ad.pro_id == 2){
					packType = 'highlight'
				}else if(ad.pro_id == 3){
					packType = 'top'
				}else{
					packType = '';
				}

				userAdContainer.innerHTML += `
					<div class="single_product ${packType}">
						<a href="${urlRoot}/posts/postdetails/${ad.id}/posts">
							<div class="product_img">
								<img src="${urlRoot}/public/asset/img/product/${ad.img_1}">
								<button data-id="${ad.id}" data-uid="${ad.user_id}" onclick="promoteAdBtn(this)" class="promote_ad_box">Promote</button>
								
								<button data-id="${ad.id}" data-table="posts" data-uid="${ad.user_id}" onclick="deleteBtn(this)" class="delete_ad_box">Delete</button>
								
								
							</div>
							<div class="info_box">
								<h3>${ad.category}</h3>
								<p>${ad.area},${ad.location}</p>
								<p>TK ${ad.price}</p>
								<p class="state_box approved">Approved</p>
								<P class="marked" ><button data-id="${ad.id}" data-uid="${ad.user_id}" onclick="changeStatus(this)" class="${className}  btn">${btnTxt}</button></P>
							</div>
						</a>

						<div class="bed_bath_box">
							<div class="bed_box">
								<i class="fas fa-bed"></i>
								<span>${ad.bedroom}</span>
							</div>
							<div class="bath_box">
								<i class="fas fa-tint"></i>
								<span>${ad.bathroom}</span>
							</div>
						</div>
						
					</div>
				`

			})

		}
	})

}



function pendingAds(btn){

	let uid = btn.dataset.id;
	let className = ''
	let btnTxt = ''

	fetch(`${urlRoot}/users/pndAds/${uid}`)
	.then(res => res.json())
	.then((data)=>{

		if(data.message == "Not Found"){

			userAdContainer.innerHTML = null

			userAdContainer.innerHTML = `
						<div class="notfound_box">
							<i class="far fa-smile-wink"></i>
							<p>You have no pending ad.</p>
						</div>
					`

		}else{

			userAdContainer.innerHTML = null

			data.forEach((ad)=>{

				

				userAdContainer.innerHTML += `
					<div class="single_product">
						<a href="${urlRoot}/posts/postdetails/${ad.id}/pending">
							<div class="product_img">
								<img src="${urlRoot}/public/asset/img/product/${ad.img_1}">
								
								<button data-id="${ad.id}" data-uid="${ad.user_id}" onclick="editAdBtn(this)" class="edit_ad_box">Edit</button>
								<button data-id="${ad.id}" data-table="pending" data-uid="${ad.user_id}" onclick="deleteBtn(this)" class="delete_ad_box">Delete</button>
							</div>
							<div class="info_box">
								<h3>${ad.category}</h3>
								<p>${ad.area},${ad.location}</p>
								<p>TK ${ad.price}</p>
								<p class="state_box pending">pending</p>
								
							</div>
						</a>

						<div class="bed_bath_box">
							<div class="bed_box">
								<i class="fas fa-bed"></i>
								<span>${ad.bedroom}</span>
							</div>
							<div class="bath_box">
								<i class="fas fa-tint"></i>
								<span>${ad.bathroom}</span>
							</div>
						</div>
						
					</div>
				`

			})

		}
	})


}



function changeStatus(btn){
	event.preventDefault();
	let action = ''
	

	let postID = btn.dataset.id;
	let userID = btn.dataset.uid;

	if(userID == uid){

		if(btn.innerText == 'Available' || btn.innerText == 'Booked'){

			if(btn.innerText == 'Available'){

				action = 'booked'
			

			}else if(btn.innerText == 'Booked'){

				action = 'available'
	
			}


			fetch(`${urlRoot}/users/changeAvailability/${userID}/${postID}/${action}`)
			.then(res => res.json())
			.then((data)=>{
				if(data.message == 'updated'){

					if(btn.innerText == 'Available'){

						btn.innerText = 'Booked'
						btn.classList.remove('available_btn')
						btn.classList.add('booked_btn')

					}else if(btn.innerText == 'Booked'){
						
						btn.innerText = 'Available'
						btn.classList.remove('booked_btn')
						btn.classList.add('available_btn')
					}

				}else{
					window.location.href = `${urlRoot}/pages/error`
				}
			})

		}else{

			window.location.href = `${urlRoot}/pages/error`

		}
		

	}else{
		window.location.href = `${urlRoot}/pages/error`
	}

	
	

}


function editAdBtn(btn){
	event.preventDefault();

	let postID = btn.dataset.id
	let userID = btn.dataset.uid

	if(userID == uid){
		window.location.href = `${urlRoot}/posts/addingPost/${postID}/${userID}`
	}else{
		window.location.href = `${urlRoot}/pages/error`
	}
	
	
	
}

function deleteBtn(btn){
	event.preventDefault();
	let postID = btn.dataset.id
	let userID = btn.dataset.uid
	let table = btn.dataset.table
	
	if(userID == uid){

		fetch(`${urlRoot}/users/deleteAd/${userID}/${postID}/${table}`)
		.then(res => res.json())
		.then((data)=>{
			if(data.message == 'Deleted'){
				btn.parentNode.parentNode.parentNode.remove()
			}else{
				window.location.href = `${urlRoot}/pages/error`
			}
		})

	}else{
		window.location.href = `${urlRoot}/pages/error`
	}
	
}


function promoteAdBtn(btn){
	event.preventDefault();

	let postID = btn.dataset.id
	let userID = btn.dataset.uid

	if(userID == uid){
		window.location.href = `${urlRoot}/posts/promotion/${postID}/${userID}`
	}else{
		window.location.href = `${urlRoot}/pages/error`
	}
}





