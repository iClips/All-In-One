let menu;
let toggle;
let sections;

document.addEventListener('DOMContentLoaded', function () {
	menu = document.getElementById("side-menu");
	toggle = document.getElementById("menu-toggle");
	toggle.addEventListener("click", toggleMenu);
	closeSideMenuOnTouchOutside();
	sections = document.querySelectorAll("section");

	initClickListeners();

    fetch('api/is_auth.php', {
        method: 'POST',
        credentials: 'include' // Send cookies
    })
    .then(response => response.json())
    .then(data => {
        console.log(JSON.stringify(data));        
    });
});

function initClickListeners() {
	document.getElementById('closeModalBtn').addEventListener('click', () => {
		document.getElementById('modal').style.opacity = 0;
		document.querySelector('#modal > div').style.transform = 'translateY(-20px)';
		setTimeout(() => {
			document.getElementById('modal').style.display = 'none';
		}, 300);
	});
}

/******************** side-menu *******************/
function toggleMenu() {
	const isOpen = menu.classList.toggle("open");
	toggle.classList.toggle("open", isOpen);
}

function closeSideMenuOnTouchOutside() {
	const menu = document.getElementById('side-menu');

	document.addEventListener('touchstart', function (event) {
		const isTouchInsideMenu = menu.contains(event.target);
		const isToggleButton = toggle.contains(event.target);

		if (!isTouchInsideMenu && !isToggleButton && menu.classList.contains('open')) {
			setTimeout(() => {
				toggleMenu();
			}, 150);
		}
	});
}

document.querySelectorAll(".menu-item").forEach(item => {
	item.addEventListener("click", (e) => {
		const targetId = e.target.dataset.id;
		const targetSection = document.getElementById(targetId);

		console.log(`Clicked: ${targetId}`);
		menu.classList.remove("open");
		toggle.classList.remove("open");

		// Toggle logic: hide others, show/hide clicked
		sections.forEach(section => {
			if (section === targetSection) {
				if (section.style.display === "block") {
					section.style.opacity = "0";
					setTimeout(() => {
						section.style.display = "none";
					}, 300);
				} else {
					section.style.display = "block";
					requestAnimationFrame(() => {
						section.style.opacity = "1";
					});
				}
			} else {
				section.style.opacity = "0";
				setTimeout(() => {
					section.style.display = "none";
				}, 300);
			}
		});

		switch (targetId) {
			case 'my-account':
				// const myAccount = document.getElementById("my-account");
				console.log('My Account');
				break;

			default:
				console.log('Default');
				break;
		}
	});
});

/******************** /side-menu *******************/