function togglePassword() {
      const passwordInput = document.getElementById('password');
      passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        }
        
function reloadCaptcha() {
      document.querySelector('.captcha-image').src = 'generate_captcha.php?' + Date.now();
        }
