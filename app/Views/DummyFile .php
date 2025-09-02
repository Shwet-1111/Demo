<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chapters</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="p-4">

  <div class="container">
    <h2 class="mb-4">Select City</h2>
    
    <!-- Dropdown -->
    <select id="cityFilter" class="form-select w-50 mb-4">
      <option value="">-- Select City --</option>
      <option value="Ahmedabad">Ahmedabad</option>
      <option value="Surat">Surat</option>
      <option value="Rajkot">Rajkot</option>
    </select>

    <!-- Chapters will load here -->
    <div id="chaptersContainer" class="row"></div>
  </div>

  <script>
    $(document).ready(function(){
      $("#cityFilter").on("change", function(){
        let city = $(this).val();

        if(city !== ""){
          $.ajax({
            url: "<?= base_url('chapters/getByCity') ?>",
            type: "GET",
            data: { city: city },
            success: function(response){
              let html = "";
              if(response.length > 0){
                response.forEach(chapter => {
                  html += `
                    <div class="col-md-4 mb-3">
                      <div class="card shadow p-3">
                        <h4>${chapter.name}</h4>
                        <p>${chapter.city}</p>
                      </div>
                    </div>
                  `;
                });
              } else {
                html = "<p class='text-danger'>No chapters found for this city.</p>";
              }
              $("#chaptersContainer").html(html);
            }
          });
        } else {
          $("#chaptersContainer").html("");
        }
      });
    });
  </script>

</body>
</html>
$routes->get('chapters', 'ChapterController::index');
$routes->get('chapters/getByCity', 'ChapterController::getByCity');


 public function getByCity()
    {
        $city = $this->request->getGet('city');
        $chapterModel = new ChapterModel();

        $chapters = $chapterModel->where('city', $city)->findAll();

        return $this->response->setJSON($chapters);
    }
}
