async function data(name) {
  let data = await fetch(`http://techschool.com/api/inputs?username=${name}`);
  let json = await data.json();
  try {
    var students = json;
    for (let i = 0; i < students.length; i++) {
      let std = students[i];
      document.body.insertAdjacentHTML(
				"beforeend",
				` <h2>Name : ${std.std_name} </h2>
          <h4>ID: ${std.id}</h4>
          <h4>Phone: ${std.phone}</h4>
          <h4>Stage: ${std.stage}</h4>
          <h4>Class: ${std.class}</h4>
          <h4>Address: ${std.address}</h4>
          <h4>Pulled :${std.pulled}</h4>
          <h4>Result :${std.result}</h4>
          <h4>Total :${std.total}</h4>
          <h4>- Money:</h4>
          <ul>
            <li>${std.g1}</li>
            <li>${std.g2}</li>
            <li>${std.g3}</li>
            <li>${std.g4}</li>
            <li>${std.g5}</li>
            <li>${std.g6}</li>
          </ul>
          <h4>Notes: ${std.notes}</h4>
          <hr />
      `
			);
    }
  } catch (error) {
    console.log(error);
  }
}

async function addStd(name) {
  try {
    let response = await fetch(`http://techschool.com/api/inputs?username=${name}`, {
      method: "POST",
      body: JSON.stringify({
        std_name: "mohamed"
      }),
    });
    const result = await response.json();
    console.log(result);
  } catch (error) {
    console.log(error);
  }
}
addStd("Mothafer");



