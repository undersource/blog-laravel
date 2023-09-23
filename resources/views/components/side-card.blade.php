<div class="w3-col l4">
    <div class="w3-card w3-margin w3-margin-top">
        <img src="{{ asset('storage/'.$user->avatar) }}" style="width:100%"/>
        <div class="w3-container w3-white">
            <h4>
                <b>{{ $user->name }}</b>
            </h4>
            <p>{{ $user->bio }}</p>
        </div>
    </div>
    <hr>
    <div class="w3-card w3-margin">
        <div class="w3-container w3-padding">
            <h4>Links</h4>
        </div>
        <ul class="w3-ul w3-hoverable w3-white">
            <li class="w3-padding-16">
                <span>https://undergit.i2p</span>
            </li>
            <li class="w3-padding-16">
                <span>https://underfrendica.i2p</span>
            </li>
        </ul>
    </div>
    <hr>
    <div class="w3-card w3-margin">
        <div class="w3-container w3-padding">
            <h4>Теги</h4>
        </div>
        <div class="w3-container w3-white">
            <p>
                <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
                <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">DIY</span>
                <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
                <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
                <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
            </p>
        </div>
    </div>
</div>