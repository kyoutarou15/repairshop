const switch_mode = () =>
{
    const modebtn = document.getElementById('switch_mode_btn');
    const is_signup = modebtn.innerHTML === 'Sign Up';

    modebtn.innerHTML = `Sign ${is_signup ? 'In' : 'Up'}`;
    document.getElementById('login_ask_text').style.display = is_signup ? 'none' : 'block';
    document.getElementById('forgot_btn').style.display = is_signup ? 'none' : 'block';
    document.getElementById('submit_btn').innerHTML = is_signup ? 'REGISTER' : 'LOGIN';
    document.getElementById('firstname').style.display = is_signup ? 'block' : 'none';
    document.getElementById('lastname').style.display = is_signup ? 'block' : 'none';
    document.getElementById('type_input').name = is_signup ? 'register' : 'login';
};