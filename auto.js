function showContent(content) {
    // Get all content items
    const contents = document.querySelectorAll('.content-item');
    const forYouButton = document.querySelector('.for-you');
    const followingButton = document.querySelector('.following');
    
    // Hide all content
    contents.forEach(item => {
        item.classList.remove('active');
        item.style.display = 'none';
    });

    // Remove active class from both buttons
    forYouButton.classList.remove('active');
    followingButton.classList.remove('active');

    // Show the selected content and mark the button as active
    if (content === 'forYou') {
        document.getElementById('forYouContent').classList.add('active');
        document.getElementById('forYouContent').style.display = 'block';
        forYouButton.classList.add('active');
    } else if (content === 'following') {
        document.getElementById('followingContent').classList.add('active');
        document.getElementById('followingContent').style.display = 'block';
        followingButton.classList.add('active');
    }
}

const sidenav = document.getElementById('sidenav');
const toggleBtn = document.getElementById('toggleBtn');

toggleBtn.addEventListener('click', function() {
    sidenav.classList.toggle('open'); // Toggle the 'open' class
    
    // Change the button text based on the sidenav state
    if (sidenav.classList.contains('open')) {
        toggleBtn.innerHTML = '✖'; // Change to "X" when open
    } else {
        toggleBtn.innerHTML = '☰'; // Change back to hamburger when closed
    }
});

function openPopup() {
    const popup = document.getElementById('popup');
    popup.classList.add('show');
}

function closePopup() {
    const popup = document.getElementById('popup');
    popup.classList.remove('show');
}

function publishPost() {
    const postFeed = document.getElementById('post-feed');
    const postInput = document.getElementById('post-input').value.trim();

    if (!postInput) return; // Prevent empty posts

    const postElement = document.createElement('div');
    postElement.className = 'post';
    postElement.innerHTML = `
        <h3>Lethabo Mohaladi</h3>
        <p>${postInput}</p>
    `;

    postFeed.prepend(postElement); // Add post to the top of feed
    document.getElementById('post-input').value = ''; // Clear input field

    closePopup(); // Close popup after publishing
}