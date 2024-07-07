//DETAILS BOX OPEN
let detailsBox = document.querySelector('.post_details_box');
let detailsBtns = document.querySelectorAll('.details');


let bodyPart = document.body;

detailsBtns.forEach((detailsBtn)=>{
	detailsBtn.addEventListener('click',(e)=>{
		e.preventDefault();


		//*********************
		let urlRoot = 'http://localhost/KingSizeProject/bashalagbe';
		let imgRoot = 'http://localhost/KingSizeProject/bashalagbe/public/asset/img/product/';
		let id = detailsBtn.dataset.id;
		let table = detailsBtn.dataset.table;

		
		fetch(`${urlRoot}/admin/singlePost/${id}/${table}`)
		.then(res => res.json())
		.then((data) =>{

			let imgArr = [data.img_1,data.img_2,data.img_3,data.img_4,data.img_5,'']
			

			//IMG INNER HTML
			let imgDivBox = '';
			
			for (var i = 0; imgArr[i] != ''; i++) {
				imgDivBox += `<div><img src="${imgRoot}${imgArr[i]}"></div>`
			}

			

			detailsBox.innerHTML = `
				<p class="logo_text_p">Bashalagbe.com</p>
				<div class="title_box user_info_title_box">
					<div>
						<p class="title_p">Seller Info</p>
						<i class="far fa-user"></i>
						<p class="title_p">#${data.user_id}</p>
					</div>
					<div>
						<i class="far fa-clock"></i>
						<p class="title_pt">${data.added_on}</p>
					</div>
				</div>
				<div class="seller_box">
					<p>Name : ${data.name}</p>
					<p>Mobile : ${data.contact}</p>
					<p>Email : ${data.email}</p>
				</div>

				<div class="title_box">
					<p class="title_p">Post Details</p>
					<i class="far fa-clone"></i>
					<p class="title_p">#${data.id}</p>
				</div>
				<div class="location_details">
					<p>Division : ${data.location}</p>
					<p>Area : ${data.area}</p>
					<p>Short Description : ${data.short_desc}</p>
					<p>Sector No : ${data.sector_no}</p>
					<p>Road No : ${data.road_no}</p>
					<p>House No : ${data.house_no}</p>
				</div>

				<div class="basicinfo_details">
					<p>Free From : ${data.free_from}</p>
					<p>Category : ${data.category}</p>
					<p>Bedroom : ${data.bedroom}</p>
					<p>Bathroom : ${data.bathroom}</p>
					<p>Belcony : ${data.belcony}</p>
					<p>Floor No : ${data.floor_no}</p>
					<p>Size : ${data.size} sqft</p>
					<p>Price : ${data.price}</p>
					<p>Gas : ${data.gas}</p>
					<p>Parking : ${data.parking}</p>
					<p>Lift : ${data.lift}</p>
					<p>CCTV : ${data.cctv}</p>
					<p>Wifi : ${data.wifi}</p>
				</div>

				<div class="details_desc_box">
					<p>
						${data.full_desc}
					</p>	
				</div>

				<div class="details_img_container">
					${imgDivBox}
				</div>

				<i class="fas fa-times details_cross_icon"></i>
			`
		})
		//********************


		detailsBox.classList.add('active');
		bodyPart.classList.add('no_scroll');

		setTimeout(()=>{
			let detailsCrossBtn = document.querySelector('.details_cross_icon');
			detailsCrossBtn.addEventListener('click',()=>{
				detailsBox.classList.remove('active');
				bodyPart.classList.remove('no_scroll');
			})
		},1000)

	})
})


//ACCEPTING POST
let  acceptBtns = document.querySelectorAll('.acceptBtn');

acceptBtns.forEach((acceptBtn)=>{
	acceptBtn.addEventListener('click',(e)=>{
		e.preventDefault();
		let urlRoot = 'http://localhost/KingSizeProject/bashalagbe';
		let postId = acceptBtn.dataset.id;

		fetch(`${urlRoot}/admin/acceptPost/${postId}`)
		.then(res => res.json())
		.then((data)=>{
			acceptBtn.parentNode.parentNode.remove()
		})


	})
})