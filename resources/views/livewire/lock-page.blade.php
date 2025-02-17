<div>
   <div class="container mt-4">
      <div class="text-center bg-white">
         <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}" alt="User Avatar"
                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; ">
          <h4 class="mt-2">{{$user->name}}</h4>
          <p class="text-muted"></p>
      </div>
      <div class="list-group mt-3">
          <div class="list-group-item bg-light fw-bold">CONTENT</div>
          <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-alt me-2"></i> Essays</a>
          <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-heart me-2"></i> Favorites</a>
          <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-book me-2"></i> Classes</a>
      </div>

      <div class="list-group mt-3">
          <div class="list-group-item bg-light fw-bold">PREFERENCES</div>
          <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <span><i class="fas fa-globe me-2"></i> Language</span>
              <span class="text-muted">English</span>
          </a>
          <div class="list-group-item d-flex justify-content-between align-items-center">
              <span><i class="fas fa-moon me-2"></i> Dark Mode</span>
              <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox">
              </div>
          </div>
          <div class="list-group-item d-flex justify-content-between align-items-center">
              <span><i class="fas fa-wifi me-2"></i> Download only via Wi-Fi</span>
              <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" checked>
              </div>
          </div>
          <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-bell me-2"></i> Notifications</a>
          <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-question-circle me-2"></i> FAQs</a>
      </div>

      <div class="list-group mt-3">
          <div class="list-group-item bg-light fw-bold">LEGAL</div>
          <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-contract me-2"></i> Terms of Service</a>
      </div>
  </div>
</div>
