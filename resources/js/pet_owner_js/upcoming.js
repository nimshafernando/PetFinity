document.querySelectorAll('.countdown-timer').forEach(timer => {
    const startDate = new Date(timer.getAttribute('data-date')).getTime();
    
    const updateCountdown = () => {
        const now = new Date().getTime();
        const distance = startDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        if (distance < 0) {
            timer.innerHTML = "EXPIRED";
            timer.style.color = 'red';
        } else {
            timer.innerHTML = `${days}d ${hours}h ${minutes}m`;

            // Change color based on the remaining time
            if (distance > 48 * 60 * 60 * 1000) {
                timer.style.color = 'green';
            } else if (distance > 24 * 60 * 60 * 1000) {
                timer.style.color = 'yellow';
            } else {
                timer.style.color = 'red';
            }
        }
    };

    updateCountdown();
    setInterval(updateCountdown, 60000);
});

// Green: More than 48 hours left.
// Yellow: Between 24 to 48 hours left.
// Red: Less than 24 hours left.
