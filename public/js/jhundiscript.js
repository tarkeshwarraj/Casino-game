document.addEventListener("DOMContentLoaded", function () {
    const playButton = document.getElementById("play-Button");
    const resetButton = document.getElementById("reset_Button");
    const images = document.querySelectorAll(".img-fluid");
    // const betAmountInput = document.getElementById("betAmount");
    // const winningsElement = document.getElementById("winnings");
    const errorElement = document.getElementById("error");
    const dice = document.querySelectorAll(".cube");
    const increments = document.querySelectorAll(".increment");
    const decrements = document.querySelectorAll(".decrement");
    const closeModalButtons = document.getElementsByClassName("close");
    const resultModal = document.getElementById("resultModal");

    let selectedValue = null;

    let finalResults = [];

    // Initialize selectedBets object
    let selectedBets = {};

    increments.forEach((button) => {
        button.addEventListener("click", function () {
            const index = this.getAttribute("data-index");
            const input = document.querySelector(
                `input[data-index="${index}"]`
            );
            input.value = parseInt(input.value) + 5;
        });
    });

    decrements.forEach((button) => {
        button.addEventListener("click", function () {
            const index = this.getAttribute("data-index");
            const input = document.querySelector(
                `input[data-index="${index}"]`
            );
            input.value = Math.max(0, parseInt(input.value) - 5);
        });
    });

    // Function to handle image click
    images.forEach((img) => {
        img.addEventListener("click", function () {
            const value = this.getAttribute("data-value");
            const betInput =
                this.nextElementSibling.querySelector(".bet-input");

            if (this.classList.contains("selected")) {
                this.classList.remove("selected");
                delete selectedBets[value];
                betInput.value = "";
            } else {
                // Toggle selected class
                this.classList.add("selected");

                if (betInput.value.trim() !== "") {
                    const betAmount = parseInt(betInput.value);
                    if (!isNaN(betAmount) && betAmount > 0) {
                        this.classList.add("selected");
                        selectedBets[value] = betAmount;
                    } else {
                        alert("Please enter a valid bet amount.");
                        this.classList.remove("selected");
                    }
                } else {
                    alert("Please enter a bet amount.");
                    this.classList.remove("selected");
                }
            }
        });
    });

    // Function to handle bet Input changes
    document.querySelectorAll(".bet-input").forEach((input) => {
        input.addEventListener("input", function () {
            const index = this.getAttribute("data-index");
            const img = document.querySelector(`img[data-value="${index}"]`);

            if (this.value.trim() !== "") {
                const betAmount = parseInt(this.value);
                if (!isNaN(betAmount) && betAmount > 0) {
                    img.classList.add("selected");
                    selectedBets[index] = betAmount;
                } else {
                    alert("Please enter a valid bet amount.");
                    img.classList.remove("selected");
                }
            } else {
                img.classList.remove("selected");
                delete selectedBets[index];
            }
        });
    });

    //Fetch balance
    // Function to check wallet balance
    function checkWalletBalance() {
        const url = "http://127.0.0.1:8000/fetch-balance"; // Replace with your actual endpoint
        fetch(url)
            .then((response) => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Failed to fetch wallet balance");
                }
            })
            .then((data) => {
                const walletBalance = data.balance; // Assuming API returns balance as JSON { balance: xxx }
                if (walletBalance <= 0) {
                    alert("Please add funds to your wallet.");
                } else {
                    // Proceed with playing logic here, e.g., show play button or start rolling
                    startPlaying();
                }
            })
            .catch((error) => {
                console.error("Error fetching wallet balance:", error);
                alert(
                    "Failed to fetch wallet balance. Please try again later."
                );
            });
    }

    // Event listener for play button
    playButton.addEventListener("click", () => {
        // Check wallet balance before allowing play
        checkWalletBalance();
    });

    // Function to start playing after wallet balance check
    function startPlaying() {
        // Your existing play logic goes here
        if (Object.keys(selectedBets).length > 0) {
            errorElement.textContent = "";

            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content");
            const url = "http://127.0.0.1:8000/save-bets";
            const data = { selectedBets: selectedBets };

            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify(data),
            })
                .then((response) => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        return response.json().then((errorData) => {
                            console.error(
                                "Failed to save bets:",
                                errorData.message
                            );
                            throw new Error(
                                errorData.message || "Failed to save bets"
                            );
                        });
                    }
                })
                .then((data) => {
                    if (data && data.random_numbers) {
                        console.log("Bets saved successfully");
                        console.log("Random Numbers:", data.random_numbers);
                        console.log("Matched Counts:", data.matched_counts);
                        console.log("Results:", data.results);
                        console.log("Total winnings:", data.total_winnings);
                        // Show final result using the random numbers received from the server
                        finalResults = data.random_numbers;
                        startRolling(data.total_winnings);
                    } else {
                        throw new Error("Invalid response structure");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    displayErrorMessage(error.message);
                });

            startRolling();
        } else {
            displayErrorMessage(
                "Please select at least one image and enter a valid bet amount."
            );
        }

        //Gsap function
        gsap.from(".scene", {
            x: 100,
            y: -200,
            duration: 1,
            scale: 0.1,
            rotation: 360,
            transformOrigin: "left top",
        });
    }

    //function to handle roll
    function startRolling(totalWinnings) {
        const rollingInterval = setInterval(() => {
            for (let i = 0; i < dice.length; i++) {
                const randomFace = Math.floor(Math.random() * 6) + 1;
                rollDice(i + 1, randomFace);
            }
        }, 1000); // Change dice face every 100ms

        setTimeout(() => {
            clearInterval(rollingInterval);
            showFinalResult();
            showResultModal(totalWinnings);
        }, 6000); // Stop rolling after 10 seconds
    }

    function showFinalResult() {
        for (let i = 0; i < dice.length; i++) {
            const finalFace = finalResults[i]; // Assuming finalResults is populated correctly
            rollDice(i + 1, finalFace);
        }
    }

    // Function to animate dice rolling
    function rollDice(diceNumber, face) {
        const cube = document.getElementById(`cube${diceNumber}`);
        const randomX = Math.floor(Math.random() * 4) + 1;
        const randomY = Math.floor(Math.random() * 4) + 1;
        const randomZ = Math.floor(Math.random() * 4) + 1;

        const faces = cube.querySelectorAll(".face");
        let finalTransform = "";

        faces.forEach((faceElem) => {
            if (faceElem.getAttribute("data-value") == face) {
                finalTransform = getTransformFromFace(faceElem);
            }
        });

        const randomTransform = `rotateX(${360 * randomX}deg) rotateY(${
            360 * randomY
        }deg) rotateZ(${360 * randomZ}deg)`;
        cube.style.transform = `${randomTransform} ${finalTransform}`;
    }

    // Function to get transform from face element
    function getTransformFromFace(faceElem) {
        const value = faceElem.getAttribute("data-value");
        switch (value) {
            case "1":
                return "rotateX(0deg) rotateY(0deg)";
            case "2":
                return "rotateX(-180deg) rotateY(0deg)";
            case "3":
                return "rotateX(0deg) rotateY(-90deg)";
            case "4":
                return "rotateX(0deg) rotateY(90deg)";
            case "5":
                return "rotateX(90deg) rotateY(0deg)";
            case "6":
                return "rotateX(-90deg) rotateY(0deg)";
            default:
                return "";
        }
    }

    //Show result modal
    function showResultModal(totalWinnings) {
        if (totalWinnings > 0) {
            resultMessage.textContent = `Congratulations! You win ${totalWinnings} Rupees`;
        } else if (totalWinnings == 0) {
            resultMessage.textContent = "Sorry Try again! You didn't win";
        }
        resultModal.style.display = "block";

        // Hide the modal after 2 seconds
        setTimeout(() => {
            resultModal.style.display = "none";
            // resultMessage.textContent = "";
        }, 3000);
    }

    // Loop through all elements with the class "close" and add event listeners
    for (let i = 0; i < closeModalButtons.length; i++) {
        closeModalButtons[i].addEventListener("click", function () {
            resultModal.style.display = "none";
        });
    }

    // Close modal when the user clicks anywhere outside of the modal
    window.addEventListener("click", function (event) {
        if (event.target == resultModal) {
            resultModal.style.display = "none";
        }
    });

    //Reset Button
    resetButton.addEventListener("click", function () {
        removeSelection();
        selectedValue = null;
        errorElement.textContent = "";
        images[6].src = "";
        document.querySelectorAll(".bet-input").forEach((input) => {
            input.value = "";
        });
        images.forEach((img) => img.classList.remove("selected"));
        selectedBets = {};
        finalResults = [];
    });

    // Toggle selection
    function toggleSelection(image) {
        const value = parseInt(image.getAttribute("data-value"));
        if (selectedValue.has(value)) {
            selectedValue = selectedValue.filter(
                (selectedValue) => selectedValue !== value
            );
            image.classList.remove("selected");
        } else {
            selectedValue.push(value);
            image.classList.add("selected");
        }
    }

    //Selected class Remove
    function removeSelection() {
        images.forEach((image) => {
            image.classList.remove("selected");
        });
        selectedValue = null;
    }

    //Selected Images
    function selectedImages() {
        images[6].src = `img/${selectedValue}.jpg`;
    }

    function displayErrorMessage(message) {
        errorElement.textContent = message;
    }
});
