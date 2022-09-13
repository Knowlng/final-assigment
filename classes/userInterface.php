<?php

interface User {

    // admin rights

    public function canToggleRegister();


    // user rights
    public function canCreateUser(); // nemato slap
    public function canDeleteUser(); // nemato slap
    public function canEditUser(); // mato viska
    public function canInspectUserFull(); // mato viska
    public function canInspectUserLess(); // nemato slap

    // user_rights rights

    public function canCreateUserRights();
    public function canDeleteUserRights();
    public function canEditUserRights();
    public function canInspectUserRights();

    // clients rights

    public function canCreateClients();
    public function canDeleteClients();
    public function canEditClients();
    public function canInspectClients();

    // clients_rights rights

    public function canCreateClientsRights();
    public function canDeleteClientsRights();
    public function canEditClientsRights();
    public function canInspectClientsRights();

    // firm rights

    public function canCreateFirms();
    public function canDeleteFirms();
    public function canEditFirms();
    public function canInspectFirms();
    
    // firm_types rights

    public function canCreateFirmTypes();
    public function canDeleteFirmTypes();
    public function canEditFirmTypes();
    public function canInspectFirmTypes();

}

class Admin implements User {

    
    // admin settings

    public function canToggleRegister(){
        return true;
    }

    //user settings

    public function canCreateUser(){
        return true;
    }

    public function canDeleteUser(){
        return true;
    }

    public function canEditUser(){
        return true;
    }

    public function canInspectUserFull(){
        return true;
    }

    public function canInspectUserLess(){
        return true;
    }

    ///user_rights rights

    public function canCreateUserRights(){
        return true;
    }

    public function canDeleteUserRights(){
        return true;
    }

    public function canEditUserRights(){
        return true;
    }

    public function canInspectUserRights(){
        return true;
    }

    // clients rights

    public function canCreateClients(){
        return true;
    }

    public function canDeleteClients(){
        return true;
    }

    public function canEditClients(){
        return true;
    }

    public function canInspectClients(){
        return true;
    }

    // clients_rights rights

    public function canCreateClientsRights(){
        return true;
    }

    public function canDeleteClientsRights(){
        return true;
    }

    public function canEditClientsRights(){
        return true;
    }

    public function canInspectClientsRights(){
        return true;
    }

    // firm rights

    public function canCreateFirms(){
        return true;
    }

    public function canDeleteFirms(){
        return true;
    }

    public function canEditFirms(){
        return true;
    }

    public function canInspectFirms(){
        return true;
    }

    // firm_types rights

    public function canCreateFirmTypes(){
        return true;
    }

    public function canDeleteFirmTypes(){
        return true;
    }

    public function canEditFirmTypes(){
        return true;
    }

    public function canInspectFirmTypes(){
        return true;
    }
}

class S_Admin implements User {

    
    // admin settings

    public function canToggleRegister(){
        return false;
    }

    //user settings

    public function canCreateUser(){
        return true;
    }

    public function canDeleteUser(){
        return true;
    }

    public function canEditUser(){
        return false;
    }

    public function canInspectUserFull(){
        return false;
    }

    public function canInspectUserLess(){
        return true;
    }

    ///user_rights rights

    public function canCreateUserRights(){
        return false;
    }

    public function canDeleteUserRights(){
        return false;
    }

    public function canEditUserRights(){
        return false;
    }

    public function canInspectUserRights(){
        return false;
    }

    // clients rights

    public function canCreateClients(){
        return true;
    }

    public function canDeleteClients(){
        return true;
    }

    public function canEditClients(){
        return true;
    }

    public function canInspectClients(){
        return true;
    } 

    // clients_rights rights

    public function canCreateClientsRights(){
        return true;
    }

    public function canDeleteClientsRights(){
        return true;
    }

    public function canEditClientsRights(){
        return true;
    }

    public function canInspectClientsRights(){
        return true;
    }

    // firm rights

    public function canCreateFirms(){
        return true;
    }

    public function canDeleteFirms(){
        return true;
    }

    public function canEditFirms(){
        return true;
    }

    public function canInspectFirms(){
        return true;
    }

    // firm_types rights

    public function canCreateFirmTypes(){
        return true;
    }

    public function canDeleteFirmTypes(){
        return true;
    }

    public function canEditFirmTypes(){
        return true;
    }

    public function canInspectFirmTypes(){
        return true;
    }
}

class Vadyb implements User {

    
    // admin settings

    public function canToggleRegister(){
        return false;
    }

    //user settings

    public function canCreateUser(){
        return false;
    }

    public function canDeleteUser(){
        return false;
    }

    public function canEditUser(){
        return false;
    }

    public function canInspectUserFull(){
        return false;
    }

    public function canInspectUserLess(){
        return true;
    }

    ///user_rights rights

    public function canCreateUserRights(){
        return false;
    }

    public function canDeleteUserRights(){
        return false;
    }

    public function canEditUserRights(){
        return false;
    }

    public function canInspectUserRights(){
        return false;
    }

    // clients rights

    public function canCreateClients(){
        return true;
    }

    public function canDeleteClients(){
        return true;
    }

    public function canEditClients(){
        return true;
    }

    public function canInspectClients(){
        return true;
    } 

    // clients_rights rights

    public function canCreateClientsRights(){
        return true;
    }

    public function canDeleteClientsRights(){
        return true;
    }

    public function canEditClientsRights(){
        return true;
    }

    public function canInspectClientsRights(){
        return true;
    }

    // firm rights

    public function canCreateFirms(){
        return true;
    }

    public function canDeleteFirms(){
        return true;
    }

    public function canEditFirms(){
        return true;
    }

    public function canInspectFirms(){
        return true;
    }

    // firm_types rights

    public function canCreateFirmTypes(){
        return true;
    }

    public function canDeleteFirmTypes(){
        return true;
    }

    public function canEditFirmTypes(){
        return true;
    }

    public function canInspectFirmTypes(){
        return true;
    }
}

class Inspek implements User {

    
    // admin settings

    public function canToggleRegister(){
        return false;
    }

    //user settings

    public function canCreateUser(){
        return false;
    }

    public function canDeleteUser(){
        return false;
    }

    public function canEditUser(){
        return false;
    }

    public function canInspectUserFull(){
        return false;
    }

    public function canInspectUserLess(){
        return true;
    }

    ///user_rights rights

    public function canCreateUserRights(){
        return false;
    }

    public function canDeleteUserRights(){
        return false;
    }

    public function canEditUserRights(){
        return false;
    }

    public function canInspectUserRights(){
        return false;
    } 

    // clients rights

    public function canCreateClients(){
        return false;
    }

    public function canDeleteClients(){
        return false;
    }

    public function canEditClients(){
        return false;
    }

    public function canInspectClients(){
        return true;
    } 

    // clients_rights rights

    public function canCreateClientsRights(){
        return false;
    }

    public function canDeleteClientsRights(){
        return false;
    }

    public function canEditClientsRights(){
        return false;
    }

    public function canInspectClientsRights(){
        return true;
    }

    // firm rights

    public function canCreateFirms(){
        return false;
    }

    public function canDeleteFirms(){
        return false;
    }

    public function canEditFirms(){
        return false;
    }

    public function canInspectFirms(){
        return true;
    }

    // firm_types rights

    public function canCreateFirmTypes(){
        return false;
    }

    public function canDeleteFirmTypes(){
        return false;
    }

    public function canEditFirmTypes(){
        return false;
    }

    public function canInspectFirmTypes(){
        return true;
    }
}

class Vart implements User {

    // admin settings

    public function canToggleRegister(){
        return false;
    }

    //user settings

    public function canCreateUser(){
        return false;
    }

    public function canDeleteUser(){
        return false;
    }

    public function canEditUser(){
        return false;
    }

    public function canInspectUserFull(){
        return false;
    }

    public function canInspectUserLess(){
        return false;
    }

    ///user_rights rights

    public function canCreateUserRights(){
        return false;
    }

    public function canDeleteUserRights(){
        return false;
    }

    public function canEditUserRights(){
        return false;
    }

    public function canInspectUserRights(){
        return false;
    }

    // clients rights

    public function canCreateClients(){
        return false;
    }

    public function canDeleteClients(){
        return false;
    }

    public function canEditClients(){
        return false;
    }

    public function canInspectClients(){
        return false;
    } 

    // clients_rights rights

    public function canCreateClientsRights(){
        return false;
    }

    public function canDeleteClientsRights(){
        return false;
    }

    public function canEditClientsRights(){
        return false;
    }

    public function canInspectClientsRights(){
        return false;
    }

    // firm rights

    public function canCreateFirms(){
        return false;
    }

    public function canDeleteFirms(){
        return false;
    }

    public function canEditFirms(){
        return false;
    }

    public function canInspectFirms(){
        return false;
    }

    // firm_types rights

    public function canCreateFirmTypes(){
        return false;
    }

    public function canDeleteFirmTypes(){
        return false;
    }

    public function canEditFirmTypes(){
        return false;
    }

    public function canInspectFirmTypes(){
        return false;
    }
}
?>