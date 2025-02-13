document.addEventListener("DOMContentLoaded", function () {
    fetch('/groups')
        .then(response => response.json())
        .then(groups => {
            let groupList = document.getElementById('groupList');
            if (!groupList) return; // Cegah error kalau elemen tidak ditemukan
            
            groupList.innerHTML = "";
            groups.forEach(group => {
                groupList.innerHTML += `
                    <li>
                        <a href="/chat/group/${group.id}">${group.name}</a>
                    </li>
                `;
            });
        })
        .catch(error => console.error("Error fetching groups:", error));
});
