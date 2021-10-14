@extends('layouts.mail')
@section('content')
<table class="es-content" cellspacing="0" cellpadding="0" align="center">
  <tbody>
    <tr>
      <td class="esd-stripe" esd-custom-block-id="2820" align="center">
        <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
          <tbody>
            <tr>
              <td class="esd-structure es-p40t es-p20b es-p40r es-p40l" esd-general-paddings-checked="false" align="left">
                <table width="100%" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td class="esd-container-frame esd-checked" width="520" valign="top" align="center">
                        <table width="100%" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td esdev-links-color="#000000" class="esd-block-text" align="left">
                                <?php echo htmlspecialchars_decode(htmlspecialchars($description, ENT_QUOTES))?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
@endsection
