class Slide2 {
    constructor() {
      this.trekButton = document.getElementById('trekButton');
      this.includeExcludeButton = document.getElementById('includeExcludeButton');
      this.mapButton = document.getElementById('mapButton');
      this.trekPanel = document.getElementById('trekPanel');
      this.includeExcludePanel = document.getElementById('includeExcludePanel');
      this.mapPanel = document.getElementById('mapPanel')
      
      this.trekButton.addEventListener('click', () => {
        this.togglePanel(this.trekPanel);
        this.closePanel(this.includeExcludePanel);
        this.closePanel(this.mapPanel);
        
      });
      
      this.includeExcludeButton.addEventListener('click', () => {
        this.togglePanel(this.includeExcludePanel);
        this.closePanel(this.trekPanel);
        this.closePanel(this.mapPanel);
      });

      this.mapButton.addEventListener('click', () => {
        this.togglePanel(this.mapPanel);
        this.closePanel(this.trekPanel);
        this.closePanel(this.includeExcludePanel);
        
      });
    }
    
    togglePanel(panel) {
      panel.style.display = (panel.style.display === 'none') ? 'flex' : 'none';
    }
    
    closePanel(panel) {
      panel.style.display = 'none';
    }
  }
  
  // Instantiate the Slide2 class
  const slide2 = new Slide2();
  function openpanel(){
  document.getElementById("trekPanel").style.display='flex';
  }
  let defaultpanel=openpanel();
  window.onload(defaultpanel)