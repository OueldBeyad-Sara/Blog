<div class="page-header d-print-none mb-2">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Messages
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div id="table-default" class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><button class="table-sort" data-sort="sort-name">Name</button></th>
              <th><button class="table-sort" data-sort="sort-city">Email</button></th>
              <th><button class="table-sort" data-sort="sort-type">Subject</button></th>
              <th><button class="table-sort" data-sort="sort-score">Message</button></th>
            </tr>
          </thead>
          @forelse ($contacts as $contact)
          <tbody class="table-tbody"><tr>
              <td class="sort-name">{{ $contact->name }}</td>
              <td class="sort-city">{{ $contact->email }}</td>
              <td class="sort-type">{{ $contact->subject }}</td>
              <td class="sort-score">{{ $contact->message }}</td>
            </tr>
            </tbody>
            @empty
                <span class="text-danger">No Author Found!</span>    
            @endforelse
        </table>
      </div>
    </div>
  </div>