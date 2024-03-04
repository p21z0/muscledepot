<link rel="stylesheet" href='test.css'>
<link rel="stylesheet" href="scan.css">
<script type="text/javascript"  src="test.js"></script>



<section class="cameras">
    <h2>Cameras</h2>
    <ul>
        <li v-if="cameras.length === 0" class="empty">No cameras found</li>
        <li v-for="camera in cameras">
        <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
        <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
            <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
        </span>
        </li>
    </ul>
</section>

<section class="scans">
    <h2>Scans</h2>
    <ul v-if="scans.length === 0">
      <li class="empty">No scans yet</li>
    </ul>
    <transition-group name="scans" tag="ul">
      <li v-for="scan in scans" :key="scan.date" :title="scan.content">
      <a v-bind:href="'<?=base_url()?>'+'scan/scanned_student/'+'<?=$url_id?>'+'/'+scan.content">View student</a></li>
    </transition-group>
  </section>
</div>


<video id="preview"></video>

<script>
document.addEventListener("DOMContentLoaded", event => {
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  Instascan.Camera.getCameras().then(cameras => {
    scanner.camera = cameras[cameras.length - 1];
    scanner.start();
  }).catch(e => console.error(e));

  scanner.addListener('scan', content => {
    console.log(content);
  });

});
  
</script>