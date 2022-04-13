<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>How to add & remove table rows</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap"
      rel="stylesheet"
    />

    <style>
       body {
        font-family: "Roboto", sans-serif;
      }
      h1 {
        text-align: center;
        display:block;
        /* background-color:#7386d5; */
      }
      table,
      form {
        width: 500px;
        margin: 20px auto;
      }
      table {
        border-collapse: collapse;
        text-align: center;
        border:0;
        
      }
      table td,
      table th {
/*         border: solid 1px black; */
      }
      label,
      input {
        display: block;
        margin: 10px 0;
        font-size: 20px;
      }
      button {
        display: block;
      }
    </style>
  </head>
  <body>
    <h1>Lab Details</h1>
    <form>
      <div class="input-row">
        <label for="lab">lab number</label>
        <input type="text" name="lab" id="lab" />
      </div>
      <div class="input-row">
        <label for="Systems">No of Systems</label>
        <input type="text" name="Systems" id="Systems" />
      </div>
      <div class="input-row">
        <label for="config">Configuration</label>
        <input type="text" name="config" id="config" />
      </div>
      <button class="btn btn-primary">Add</button>
    </form>
    <div class="col-lg-8 m-auto d-block table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
      <thead>
        <tr>
          <th>lab number</th>
          <th>No of Systems</th>
          <th>Configuration</th>
          <th>Button </th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
    </div>
   
    <script>
      const formEl = document.querySelector("form");
      const tbodyEl = document.querySelector("tbody");
      const tableEl = document.querySelector("table");
      function onAddWebsite(e) {
        e.preventDefault();
        const Systems = document.getElementById("Systems").value;
        const lab = document.getElementById("lab").value;
        const  config= document.getElementById("config").value;
        tbodyEl.innerHTML += `
            <tr>
                <td>${lab}</td>
                <td>${Systems}</td>
                <td>${config}</td>
                <td><button class="deleteBtn">Delete</button></td>
            </tr>
        `;
      }

      function onDeleteRow(e) {
        if (!e.target.classList.contains("deleteBtn")) {
          return;
        }

        const btn = e.target;
        btn.closest("tr").remove();
      }

      formEl.addEventListener("submit", onAddWebsite);
      tableEl.addEventListener("click", onDeleteRow);
    </script>
  </body>
</html>