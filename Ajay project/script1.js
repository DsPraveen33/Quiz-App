function submitScore() {
    const username = document.getElementById('username').value;
    const score = parseInt(document.getElementById('score').value, 10);
    
    if (!username || isNaN(score)) {
        alert('Please enter both name and score.');
        return;
    }

    let leaderboard = JSON.parse(localStorage.getItem('leaderboard')) || [];
    
    leaderboard.push({ username, score });
    
    // Sort the leaderboard in descending order of scores
    leaderboard.sort((a, b) => b.score - a.score);

    // Save the updated leaderboard to local storage
    localStorage.setItem('leaderboard', JSON.stringify(leaderboard));

    // Update the leaderboard display
    displayLeaderboard();
}

function displayLeaderboard() {
    const leaderboard = JSON.parse(localStorage.getItem('leaderboard')) || [];
    const leaderboardList = document.getElementById('leaderboardList');

    leaderboardList.innerHTML = '';
    
    leaderboard.forEach((entry, index) => {
        const li = document.createElement('li');
        li.textContent = ${index + 1}. ${entry.username} - ${entry.score};
        leaderboardList.appendChild(li);
    });
}

// Initial display of leaderboard
displayLeaderboard();