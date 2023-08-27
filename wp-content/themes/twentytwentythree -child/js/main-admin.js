function readURL(input) {
	let product_image = _product_image.files[0];
	if (product_image) {
		see_img.src = URL.createObjectURL(product_image);
		localStorage.setItem('myImage', see_img.src);
	}


	see_img.src = localStorage.getItem('myImage');

	console.log(see_img.src);
}

	window.addEventListener("DOMContentLoaded", event => {
		console.log(see_img.src=_product_image.value );
	/* 	console.log(see_img.src = URL.createObjectURL(product_image)) */
		/* see_img.src = URL.createObjectURL(product_image);
		console.log(see_img.src)
		console.log(see_img.src = URL.createObjectURL(product_image))
		console.log(see_img.src = localStorage.getItem('myImage')); */
	})
	

window.addEventListener('load', function() {
	see_img.src = localStorage.getItem('myImage')
	
		
  })

const delete_image = document.getElementById('_delete_image');

let img_dow = document.getElementById("_product_image");
let new_img_dow = img_dow.cloneNode( true );

delete_image.onclick = function(){
	see_img.src =''
	img_dow.value = '';	
	
	img_dow.replaceWith( new_img_dow );
	img_dow = new_img_dow;
	see_img.src =''
}



window.onload = function () {





	const create_div = document.getElementById('woocommerce-product-data');
	const create_btn = document.createElement('div');
	create_btn.className = "btn_block"
	create_btn.innerHTML = `<button type="button" id="btn_remove" class="btn_remove">Очистить</button>				
							<p class="submit"><input type="submit" name="submit" id="submit" class="btn_save" value="Сохранить" /></p>`;


	create_div.append(create_btn);

		const update = document.getElementById('submit');
	
		update.onclick = function(){
		
		 console.log('нажал')
		 
		 
		}

	/*  <button type="button" id="btn_save" class="btn_save">Сохранить</button>*/
	const remove_btn = document.getElementById("btn_remove")

	remove_btn.onclick = function () {
		document.getElementById("_product_date").value ='';
		document.getElementById("_product_type").value ='';
		
		img_dow.value = '';		
		img_dow.replaceWith( new_img_dow );
		img_dow = new_img_dow;
		see_img.src =''

	}




	
}



