document.addEventListener('DOMContentLoaded', function () {
  // Login Form Validation
  document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission
    event.stopPropagation(); // Stop event propagation

    // Reset previous errors
    resetLoginFormErrors();

    // Fetch form values
    const email = document.getElementById('loginEmail').value.trim();
    const password = document.getElementById('loginPassword').value.trim();

    // Basic validation
    let isValid = true;

    if (!email) {
      setLoginFormError('loginEmail', 'Please enter your email address.');
      isValid = false;
    }

    if (!password) {
      setLoginFormError('loginPassword', 'Please enter your password.');
      isValid = false;
    }

    // Submit the form if valid
    if (isValid) {
      this.submit();
    }
  });

  // Signup Form Validation
  document.getElementById('signupForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission
    event.stopPropagation(); // Stop event propagation

    // Reset previous errors
    resetSignupFormErrors();

    // Fetch form values
    const name = document.getElementById('signupName').value.trim();
    const email = document.getElementById('signupEmail').value.trim();
    const password = document.getElementById('signupPassword').value.trim();
    const confirmPassword = document.getElementById('signupConfirmPassword').value.trim();

    // Basic validation
    let isValid = true;

    if (!name) {
      setSignupFormError('signupName', 'Please enter your full name.');
      isValid = false;
    }

    if (!email) {
      setSignupFormError('signupEmail', 'Please enter your email address.');
      isValid = false;
    }

    if (!password) {
      setSignupFormError('signupPassword', 'Please enter a password.');
      isValid = false;
    }

    if (!confirmPassword) {
      setSignupFormError('signupConfirmPassword', 'Please confirm your password.');
      isValid = false;
    } else if (password !== confirmPassword) {
      setSignupFormError('signupConfirmPassword', 'Passwords do not match.');
      isValid = false;
    }

    // Submit the form if valid
    if (isValid) {
      this.submit();
    }
  });

  // Function to reset login form errors
  function resetLoginFormErrors() {
    document.getElementById('loginEmail').classList.remove('is-invalid');
    document.getElementById('loginPassword').classList.remove('is-invalid');
    document.getElementById('loginEmailError').textContent = '';
    document.getElementById('loginPasswordError').textContent = '';
  }

  // Function to set login form error
  function setLoginFormError(inputId, errorMessage) {
    document.getElementById(inputId).classList.add('is-invalid');
    document.getElementById(`${inputId}Error`).textContent = errorMessage;
  }

  // Function to reset signup form errors
  function resetSignupFormErrors() {
    document.getElementById('signupName').classList.remove('is-invalid');
    document.getElementById('signupEmail').classList.remove('is-invalid');
    document.getElementById('signupPassword').classList.remove('is-invalid');
    document.getElementById('signupConfirmPassword').classList.remove('is-invalid');
    document.getElementById('signupNameError').textContent = '';
    document.getElementById('signupEmailError').textContent = '';
    document.getElementById('signupPasswordError').textContent = '';
    document.getElementById('signupConfirmPasswordError').textContent = '';
  }

  // Function to set signup form error
  function setSignupFormError(inputId, errorMessage) {
    document.getElementById(inputId).classList.add('is-invalid');
    document.getElementById(`${inputId}Error`).textContent = errorMessage;
  }
});
