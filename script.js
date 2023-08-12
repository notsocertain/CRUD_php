const s_username = document.getElementById('s_username')
const s_password = document.getElementById('s_password')
const signup_form = document.getElementById('signup_form')
const u_signup_error = document.getElementById('u_signup_error')
const p_signup_error = document.getElementById('p_signup_error')

signup_form.addEventListener('submit', (e) => {
  let messages = []
  if (s_username.value === '' || e_name.value == null) 
  {
    messages.push('Username is required')
    if (messages.length > 0) 
    {
      e.preventDefault()
      u_signup_error.innerText = messages.join(', ')
    }
  }

  messages =[]

  if (s_password.value <= 6) {
    messages.push('Password must be greater than 6 words')
    if (messages.length > 0) 
    {
      e.preventDefault()
      p_signup_error.innerText = messages.join(', ')
    }
  }


})