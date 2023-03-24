require('./bootstrap');

import VenoBox from 'venobox';
import axios from 'axios';


new VenoBox({
    selector: '.myGallery',
    numeration: true,
    spinner: 'grid',
    spinColor:'#F5CC7A',
    share: false,
  });

  new VenoBox({
    selector: '.event',
    numeration: true,
    spinner: 'grid',
    spinColor:'#F5CC7A',
    share: false,
  });
