document.getElementById("addButton").addEventListener("click", function () {
  addRow();
});

function addRow() {
  var table = document.getElementById("participantTable");
  var newRow = document.createElement("tr");

  newRow.innerHTML = `
      <td>
        <input type="text" class="name" required size="10" />
      </td>
      <td>
        <div>
          <input type="radio" class="event" name="event_${Date.now()}" value="OK" checked/>
          <label>参加</label>
        </div>
        <div>
          <input type="radio" class="event" name="event_${Date.now()}" value="NG" />
          <label>不参加</label>
        </div>
      </td>
      <td>
        <textarea class="memo" rows="5" cols="60" placeholder="持ち込みや連絡事項があれば記入してください。"></textarea>
      </td>
    `;

  table.appendChild(newRow);
}
