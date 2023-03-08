<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form id="user-form">
      <label for="penduduk">Input Data Penduduk (Nama Umur Kota) :</label>
      <br>
      <input type="text" id="penduduk" name="penduduk" /><br />

      <button type="submit">Submit</button>
    </form>

    <script>
      const form = document.getElementById("user-form");
      form.addEventListener("submit", async (event) => {
        event.preventDefault();
        const formData = new FormData(form);
        const penduduk = formData.get("penduduk");
        const body = { penduduk };
        const response = await fetch("/api/penduduk", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(body),
        });
        if (response.ok) {
          alert("User created successfully");
        } else {
          alert("Error creating user");
        }
      });
    </script>
  </body>
</html>
