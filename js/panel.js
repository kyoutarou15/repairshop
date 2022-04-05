const nav_list = [
    'dashboard',
    'services',
    'history',
    'profile',
    'staff',
    // 'logout'
];

const months_list = [
    'January', 
    'February', 
    'March', 
    'April', 
    'May', 
    'June', 
    'July', 
    'August', 
    'September', 
    'October', 
    'November',
    'December'
];

const handler_nav_click = (sender) =>
{
    let matched_nav = '';

    nav_list.forEach(nav =>
    {
        const fulln = `nav_${nav}`;
        document.getElementById(fulln).classList.remove('nav_selected');
        document.getElementById(`view_${nav}`).style.display = 'none';

        if (sender.id == fulln)
            matched_nav = nav;
    });

    sender.classList.add('nav_selected');
    document.title = document.getElementById('panel_indicator').innerHTML = matched_nav.charAt(0).toUpperCase() + matched_nav.slice(1);
    document.getElementById(`view_${matched_nav}`).style.display = 'flex';
}

const on_load = () =>
{
    document.getElementById('view_dashboard').style.display = 'flex';

    const dt  = new Date();
    const dtn = new Date(dt.getFullYear(), dt.getMonth() + 1, 0);
    const dtd = new Date(dt.getFullYear(), dt.getMonth(), 1);
    document.getElementById('calen_display').innerHTML = `${months_list[dt.getMonth()]} ${dt.getFullYear()}`;

    const ctb = document.getElementById('calen_table');
    const days_in_month = dtn.getDate();

    let days = 0;
    for (let y = 0; y < 6; ++y)
    {
        let row = document.createElement('tr');
        for (let x = 0; x < 7; x++)
        {
            const skip = y == 0 && x < dtd.getDay();
            let slot = document.createElement('td');
            

            if (!skip && ++days == days_in_month)
                break;
            
            if (days == dt.getDate())
                slot.classList.add('calen_now');

            slot.innerHTML = skip ? '' : days;
            row.appendChild(slot);
        }

        ctb.appendChild(row);
        if (days == days_in_month)
                break;
    }

}