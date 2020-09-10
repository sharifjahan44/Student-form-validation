(function($){
	$(document).ready(function(){


		$(".co1").show(500);
		let s = setInterval(function(){
			$(".co1").hide(500);
			$(".co2").show(500);
			let ss = setInterval(function(){
				$(".co2").hide(500);
				$(".co3").show(500);

				let sss = setInterval(function(){
					$(".co3").hide(500);
					$(".co4").show(500);

					let ssss = setInterval(function(){
						$(".co4").hide(500);
						$(".co5").show(500);

						let sssss = setInterval(function(){
							$(".co5").hide(500);
							$(".co6").show(500);

							let ssssss = setInterval(function(){
								$(".co6").hide(500);
								$(".co7").fadeIn(500);
								clearInterval(ssssss);
							},3000);

							clearInterval(sssss);
						},3000);

						clearInterval(ssss);
					},3000);

					clearInterval(sss);
				},3000);

				clearInterval(ss);
			},3000);
			clearInterval(s);
		},3000);

	});
})(jQuery)