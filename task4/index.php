<?php
// index.php
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>json data modifier</title>
  <style>
    body { font-family: Arial; direction: rtl; margin: 20px; }
    button { margin: 2px; padding: 5px 10px; }
    pre { background: #f0f0f0; padding: 10px; border-radius: 5px; white-space: pre-wrap; }
  </style>
</head>
<body>

  <h2>📋 list of users </h2>
  <!-- <button onclick="getUsers()"></button> -->
  <button onclick="addUser()">add new user </button>
  <div id="output"></div>

  <script>
    // عرض البيانات
    function getUsers() {
      fetch('read.php')
        .then(res => res.json())
        .then(data => {
          const container = document.getElementById('output');
          container.innerHTML = '';

          data.forEach(user => {
            const item = document.createElement('pre');
            item.textContent = JSON.stringify(user, null, 2);

            const editBtn = document.createElement('button');
            editBtn.textContent = 'update';
            editBtn.onclick = () => updateUser(user.id, user.fname, user.lname);

            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'delete';
            deleteBtn.onclick = () => deleteUser(user.id);

            container.appendChild(item);
            container.appendChild(editBtn);
            container.appendChild(deleteBtn);
            container.appendChild(document.createElement('hr'));
          });
        })
        .catch(err => {
          alert("error  " + err);
        });
    }

    // إضافة مستخدم جديد
    function addUser() {
      const fname = prompt("first name ");
      const lname = prompt("last name ");

      if (fname && lname) {
        fetch('insert.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ fname, lname })
        })
        .then(res => res.json())
        .then(data => {
          alert(JSON.stringify(data, null, 2));
          getUsers();
        });
      } else {
        alert("error firstname or lasrname is empty ");
      }
    }

    // تعديل
    function updateUser(id, oldFname, oldLname) {
      const fname = prompt("new first name ", oldFname);
      const lname = prompt("new last name", oldLname);

      if (fname && lname) {
        fetch('update.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ id, fname, lname })
        })
        .then(res => res.json())
        .then(data => {
          alert(JSON.stringify(data, null, 2));
          getUsers();
        });
      }
    }

    // حذف
    function deleteUser(id) {
      if (confirm("are you sure to delete ")) {
        fetch('delete.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ id })
        })
        .then(res => res.json())
        .then(data => {
          alert(JSON.stringify(data, null, 2));
          getUsers();
        });
      }
    }

    // تحميل تلقائي
    window.onload = getUsers;
  </script>
</body>
</html>
