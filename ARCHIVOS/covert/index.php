<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.7/xlsx.full.min.js"></script>

<script type="text/javascript">
  
  let result = {
    client: null,
    type: null,
    fileData: null,
    code: null
  }
  

  function convertXlsToJson(file, code){

    /* set up XMLHttpRequest */
    var url = file+'/'+file+".xlsx";
    var oReq = new XMLHttpRequest();
    execute(oReq, 'pendientes')

    /* set up XMLHttpRequest */
    var url = file+'/'+"abonados.xlsx";
    var oReq = new XMLHttpRequest();
    execute(oReq, 'abonados')

    //let code = randomCode(6, '#')

    function execute(oReq, type){
      
      oReq.open("GET", url, true);
      oReq.responseType = "arraybuffer";

      oReq.onload = function(e) {
        
        var arraybuffer = oReq.response;

        /* convert data to binary string */
        var data = new Uint8Array(arraybuffer);
        var arr = new Array();
        
        for(var i = 0; i != data.length; ++i) arr[i] = String.fromCharCode(data[i]);
        var bstr = arr.join("");

        /* Call XLSX */
        var workbook = XLSX.read(bstr, {type:"binary"});

        /* DO SOMETHING WITH workbook HERE */
        var first_sheet_name = workbook.SheetNames[0];

        /* Get worksheet */
        var worksheet = workbook.Sheets[first_sheet_name];
        //console.log(XLSX.utils.sheet_to_json(worksheet,{raw:false}));

        let fileData = XLSX.utils.sheet_to_json(worksheet,{raw:false});          
        let client = file.replace('_', ' ')

        result.client = client
        result.type = type
        result.fileData = fileData
        result.code = code

        createTextFile(result)

      }

      oReq.send();
    }

  }

  function randomCode(long, val){
    
    let char = [
      'B' ,'C' ,'D' ,'F' ,'G' ,'H' ,'J' ,'K' ,'L' ,'M' ,'N' ,'P' ,'Q' ,'R' ,'S' ,'T' ,'V' ,'W' ,'X' ,'Y' ,'Z',
      'b' ,'c' ,'d' ,'f' ,'g' ,'h' ,'j' ,'k' ,'l' ,'m' ,'n' ,'p' ,'q' ,'r' ,'s' ,'t' ,'v' ,'w' ,'x' ,'y' ,'z'
    ]

    let randC = Math.floor(Math.random() * (42 - 0)) + 0
    char = char[randC]+'-'

    for(let i = 1; i <= long; i++){
      let rand = Math.floor(Math.random() * (9 - 0)) + 0
      char += rand
    }
    
    return val+char
  
  }

  function procesData(){
    
    let data = [
      'alfredo_colombia', 
      'claris_prima',
      'jonas',
      'martin_busqueda',
      'nuris_yaritsa',
      'zaida_nairoby',
      'maria_perlita',
      'wilkin_locutorio',
      'maribel_pld'
    ]

    let code = [
      '001-002', 
      '001-004', 
      '001-005', 
      '001-003',
      '001-006',
      '001-008',
      '001-011',
      '001-012',
      '001-009'
    ]

    for(let i = 0; i < data.length; i++){
      convertXlsToJson(data[i], code[i])
    }
  }

  function createTextFile(fileData){
    
    //console.log(fileData)
    console.log(fileData)

    $.ajax({
      url: 'creator.php',
      type: 'POST',
      data: {
        fileData: fileData
      },
      success: function(response){
        //console.log(response);
      }
    })
  }
  
  procesData()
  
  


</script>
