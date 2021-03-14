<div class="row g-3 text-left">
    <div class="col-sm-12 col-md-6">
        <label for="name" class="pl-1">Név:</label>
        <input type="text" id="name" class="form-control mt-2" placeholder="Teljes név" required>
    </div>
    <div class="col-sm-12 col-md-6">
        <label for="email" class="pl-1">Email:</label>
        <input type="email" id="email" class="form-control mt-2" placeholder="Email cím" required>
    </div>
    <div class="col-12">
        <label for="message" class="pl-1">Üzenet:</label>
        <textarea id="message" class="form-control mt-2" placeholder="Ide írhatod az üzeneted" required></textarea>
    </div>
    <div class="col-12">
        <!-- TODO - doesn't actually do anything // should do something -->
        <a href="/zarodolgozat" class="btn btn-dark w-100">Küldés</a>
    </div>
</div>